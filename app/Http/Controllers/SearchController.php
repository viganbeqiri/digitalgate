<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->keyword . '%')->selectRaw('*,name as title ,"product" as search_type')->with('parentProduct', 'page')->get();
        $outsourcing = Page::where('title', 'like', '%' . request()->keyword . '%')->whereHas('parent', function ($query) {
            $query->where('slug', 'outsourcing');
        })->selectRaw('*, "outsourcing" as search_type')->get();

        $products->push(...$outsourcing);

        $result = $products->groupBy('search_type');

        return  Inertia::render('Search', [
            'results' => $result,
            'query' => $request->keyword
        ]);
    }
}
