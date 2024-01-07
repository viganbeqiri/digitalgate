<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.products.index');
    }

    public function createEdit($id = null)
    {
        $data = [];
        $data = \App\Models\Product::find($id);
        return view('admin.products.add-edit', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
    }

    public function update(Request $request)
    {
    }

    public function destroy(Request $request)
    {
    }
}
