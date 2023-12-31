<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class OrdersController extends Controller
{
    public function index()
    {
    }
    public function storeNDA(Request $request)
    {
        // return ;
        $request->validate([
            'full_name' => 'required',
            'request_type' => 'required',
            'has_business_license' => 'required',
            'nda_file' => 'required',
            'order_items' => 'required'
        ]);
        $orderItems = collect(json_decode($request->order_items))->map(function ($item) {
            return [
                'product_id' => $item->id,
                'price' => $item->price
            ];
        });
        $subTotal = $orderItems->sum('price');
        $vat_rate = (float) 0.18;
        $vat = $subTotal * $vat_rate;
        $totalPrice = $subTotal + $vat;

        $order = new Order;
        $order->order_no = Order::generateSerialNumber();
        $order->user_id = auth()->user()->id;
        $order->full_name = $request->full_name;
        $order->current_step = 2;


        $order->tax = $vat;
        $order->total_price = $totalPrice;
        $order->subtotal = $subTotal;
        $order->save();

        // upload NDA file
        if ($request->hasFile('nda_file')) {
            Storage::put('orders/documents/' . $order->id, $request->nda_file);
            //            $request->nda_file = $this->uploadFile($request, 'nda_file', $order);
        }
        if ($request->hasFile('license_file')) {
            Storage::put('orders/documents/' . $order->id, $request->license_file);
            //            $request->nda_file = $this->uploadFile($request,'license_file', $order);
        }

        $order->orderDocument()->create([
            'order_id' => $order->id,
            'request_type' => $request->request_type,
            'license_file_url' => $request->license_file,
            'nda_file_url' => $request->nda_file,
        ]);



        $order->orderItems()->createMany($orderItems);
        return back()->with([
            'messages' => 'NDA saved successfully',
            'order' => $order
        ]);
    }

    public function storeDetail(Request $request)
    {
        $request->validate([
            'business_name' => 'required',
            'business_type' => 'required',
            'business_location' => 'required',
            'business_logo' => 'required',
            'business_logo_preferred' => 'nullable',
            'preferred_domain' => 'nullable',
            'total_employees' => 'required|numeric',
            'design_look' => 'nullable',
            'design_look_preferred' => 'nullable',
            'emails' => 'nullable',
            'content_file' => 'nullable',
        ]);

        $order = Order::find($request->order_id);
        $business_logo_name = null;
        $company_profile_url = null;
        $content_zip_url = null;

        if ($request->hasFile('business_logo')) {
            $business_logo_name = time() . '.' . $request->business_logo->extension();
            $request->file('business_logo')->storeAs('orders/document', $business_logo_name);
        }

        if ($request->hasFile('company_profile')) {
            $company_profile_url = time() . '.' . $request->company_profile->extension();
            $request->file('company_profile')->storeAs('orders/document', $company_profile_url);
        }

        if ($request->hasFile('content_file')) {
            $content_zip_url = time() . '.' . $request->content_file->extension();
            $request->file('content_file')->storeAs('orders/document', $content_zip_url);
        }


        $order->orderDetail()->updateOrCreate([
            'order_id' => $order->id
        ], [
            'business_name' => $request->business_name,
            'business_type' => $request->business_type,
            'business_location' => $request->business_location,
            'business_logo_url' => 'orders/document/' . $business_logo_name,
            'business_logo_preferred' => $request->business_logo_preferred,
            'total_employees' => $request->total_employees,
            'preferred_domain' => $request->preferred_domain,
            'business_emails' => $request->emails,
            'design_look_preferred' => $request->design_look_preferred,
            'design_look' => $request->design_look,
            'content_zip_url' => 'orders/document/' . $content_zip_url,
            'company_profile_url' => 'orders/document/' . $company_profile_url,
            'content_platform' => $request->content_platform
        ]);

        $order->current_step = 3;
        $order->save();
        // return $order->orderDetail;
        return back()->with([
            'messages' => 'Details saved successfully',
            'order' => $order
        ]);
    }

    public function storePaymentDetail(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'card_number' => 'required',
            'card_holder_name' => 'required',
            'card_expiration' => 'required',
            'card_cvv' => 'required',
        ]);

        $order = Order::find($request->order_id);

        $order->orderPayment()->updateOrCreate(
            [
                'order_id' => $order->id
            ],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'country' => $request->country,
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'city' => $request->city,
                'card_number' => $request->card_number,
                'card_holder_name' => $request->card_holder_name,
                'card_expiration' => $request->card_expiration,
                'card_cvv' => $request->card_cvv
            ]
        );

        $order->current_step = 4;
        $order->save();
        return back()->with([
            'messages' => 'Payment saved successfully',
            'order' => $order
        ]);
    }

    private function uploadFile($request, $field, $order)
    {
        return $request->file($field)->store('order/' . $order->id, 'public');
    }
}
