<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OutsourcingController extends Controller
{
    public function index(Request $request)
    {
        $path =  explode('/', $request->path());
        $page = Page::where('slug', $path[1])->first();


        return Inertia::render('OutsourcingDetail', [
            'page' => $page
        ]);
    }

    public function quote()
    {
        $services = Page::where('title', 'like', '%' . request()->keyword . '%')->whereHas('parent', function ($query) {
            $query->where('slug', 'outsourcing');
        })->select('id', 'title')->get();

        return Inertia::render('OutsourcingQuote', [
            'services' => $services
        ]);
    }

    public function storeQuote(Request $request)
    {

        $request->validate([
            'service_name' => 'required',
            'company_name' => 'required',
            'requester_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        // return $request->all();

        $quotatation = new Quotation();
        $quotatation->fill($request->all());
        $quotatation->save();
        // add message success

        return back()->with([
            'messages' => 'Success! We have received your request. We will contact you soon.',
            'quotation' => $quotatation
        ]);
    }
}
