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
        $products = $page->products()->get();
        return Inertia::render('Services', [
            'data' => $page,
            'products' => $products,
            'active' => $path

        ]);
    }
}
