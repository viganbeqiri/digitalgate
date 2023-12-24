<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        $path =  explode('/', $request->path());
        $page = Page::where('slug', $path[1])->first();
        if ($path[1] == 'design-service') {
            $products = $page->products()->where('mandatory', 1)->with('childProduct')->get();
        } else {
            $products = $page->products()->get();
        }
        // return $products;
        return Inertia::render('Services', [
            'page' => $page,
            'products' => $products,
            'active' => $path

        ]);
    }

    public function order(Request $request)
    {
        return Inertia::render('Order', []);
    }
}
