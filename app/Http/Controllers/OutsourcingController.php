<?php

namespace App\Http\Controllers;

use App\Models\Page;
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
}
