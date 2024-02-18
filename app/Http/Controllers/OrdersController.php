<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $orders = $orders = Order::where('user_id', auth()->user()->id);

        if ($request->search) {
            $orders->whereRaw('concat_ws("|", full_name, order_no, created_at) like ?', '%' . $request->search . '%');
        }

        if ($request->field && $request->direction) {
            $orders->orderBy($request->field, $request->direction);
        }

        if ($request->status) {
            $orders->where('status', $request->status);
        }

        $limit = $request->limit ?? 10;

        return Inertia::render('MyOrder', [
            'orders' => $orders->paginate($limit),
            'query' => $request->all()
        ]);
    }

    public function show($id)
    {
        $order = Order::with('user', 'orderItems.product', 'orderDocument', 'orderDetail')->where('id', $id)->first();
        if (!$order) {
            abort(404);
        }
        if ($order->user_id != auth()->user()->id) {
            abort(404);
        }

        $order->documents = $order->documents;
        return Inertia::render('OrderDetail', [
            'order' => $order
        ]);
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
            $nda_file = time() . '.' . $request->nda_file->extension();
            $request->file('nda_file')->storeAs('orders/document', $nda_file);
        }
        if ($request->hasFile('license_file')) {
            $license_file = time() . '.' . $request->license_file->extension();

            $request->file('license_file')->storeAs('orders/document', $license_file);
        }

        $order->orderDocument()->create([
            'order_id' => $order->id,
            'request_type' => $request->request_type,
            'license_file_url' => 'orders/documents/' . $order->id . '/' . $license_file,
            'nda_file_url' => 'orders/documents/' . $order->id . '/' . $nda_file,
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

    public function storeCohort(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'founder_name' => 'required',
            'co_founder_name' => 'required',
            'founder_resume' => 'required',
            'co_founder_resume' => 'required',
            'idea_age' => 'required',
            'done_analysis' => 'required',
            'market_analysis_file' => 'required',
            'market_strategy' => 'required',
            'exit_strategy' => 'required',
            'org_chart_stage_holder_status' => 'required',
            'org_chart_file' => 'required'
        ]);

        $product = Product::query()->where('slug', 'incubation-chohort')->first();
        if (!$product) {
            return redirect()->back()->with(['error' => 'Product not found']);
        }

        $order = new Order;
        $order->order_no = Order::generateSerialNumber();
        $order->user_id = auth()->user()->id;
        $order->full_name = $request->founder_name;
        $order->current_step = 2;
        $order->subtotal = $product->price;

        $processingFeeRate = 19;
        $processingFee = ($processingFeeRate / 100) * $order->price;
        $order->tax = $processingFee;
        $order->total_price = $product->price + $processingFee;
        $order->save();

        if ($request->hasFile('founder_resume')) {
            $founder_resume = time() . '.' . $request->founder_resume->extension();
            $request->file('founder_resume')->storeAs('orders/document', $founder_resume);
        }
        if ($request->hasFile('co_founder_resume')) {
            $co_founder_resume = time() . '.' . $request->co_founder_resume->extension();
            $request->file('co_founder_resume')->storeAs('orders/document', $co_founder_resume);
        }

        if ($request->hasFile('org_chart_file')) {
            $org_chart_file = time() . '.' . $request->org_chart_file->extension();
            $request->file('org_chart_file')->storeAs('orders/document', $org_chart_file);
        }


        $order->orderIncubationDetail()->updateOrCreate([
            'order_id' => $order->id
        ], [
            'founder_name' => $request->founder_name,
            'co_founder_name' => $request->co_founder_name,
            'founder_portofolio_url' => $founder_resume,
            'co_founder_portofolio_url' => $co_founder_resume,
            'idea_age' => $request->idea_age,
            'market_analyst' => $request->done_analysis,
            'market_analyst_url' => $request->market_analysis_file,
            'market_strategy' => $request->market_strategy,
            'exit_strategy' => $request->market_strategy,
            'org_chart' => $request->org_chart_stage_holder_status,
            'org_chart_url' => $org_chart_file
        ]);

        $order->orderItems()->updateOrCreate([
            'order_id' => $order->id,
            'product_id' => $product->id
        ], [
            'price' => $product->price
        ]);
        return redirect()->back()->with([
            'messages' => 'Order created successfully',
            'order' => [
                'active' => $order,
                'items' => [$product]
            ],

        ]);
    }

    public function storePickDeck(Request $request)
    {
        // dd($request->all());
        // return $request->all();
        $request->validate([
            'startup_name' => 'required',
            'request_type' => 'required',
            'application_budget_file' => 'required',
            'has_business_license' => 'required',
            'presentation_file' => 'required',
            'business_license_file' => 'required_if:has_business_license,1',
            'order_id' => 'required'
        ]);

        $order = Order::find($request->order_id);
        $application_budget_file = null;
        $presentation_file = null;
        $business_license_file = null;

        if ($request->hasFile('application_budget_file')) {
            $application_budget_file = time() . '.' . $request->application_budget_file->extension();
            $request->file('application_budget_file')->storeAs('orders/document', $application_budget_file);
        }

        if ($request->hasFile('presentation_file')) {
            $presentation_file = time() . '.' . $request->presentation_file->extension();
            $request->file('presentation_file')->storeAs('orders/document', $presentation_file);
        }

        if ($request->hasFile('business_license_file')) {
            $business_license_file = time() . '.' . $request->presentation_file->extension();
            $request->file('business_license_file')->storeAs('orders/document', $business_license_file);
        }



        $order->orderIncubationDeck()->updateOrCreate([
            'order_id' => $order->id
        ], [
            'startup_name' => $request->startup_name,
            'request_type' => $request->request_type,
            'has_business_license' => $request->has_business_license,
            'budget_url' => $application_budget_file,
            'presentation_url' => $presentation_file,
            'business_license_url' => $business_license_file
        ]);

        $order->current_step = 3;
        $order->save();

        return redirect()->back()->with([
            'messages' => 'Order created successfully',
            'order' => $order
        ]);
    }

    private function uploadFile($request, $field, $order)
    {
        return $request->file($field)->store('order/' . $order->id, 'public');
    }
}
