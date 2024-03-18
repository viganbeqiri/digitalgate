<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
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
        $data = Product::find($id);
        $category = Category::whereNull('parent_id')->select('id','title', 'slug')->with('childCategory',function ($q){
            $q->select('id','title', 'slug','parent_id');
        })->get();
        $page = Page::query()->select('title', 'slug', 'id')->whereNull('parent_id')->with('children',function ($q){
            $q->select('id','title', 'slug','parent_id');
        })->get();
        $res = ['data' => $data,
            'category' => $category,
            'page' => $page];
        return view('admin.products.add-edit', $res);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if(isset($data['id']) && $data['id'] != '') {
            $model = Product::find($data['id']);
        } else {
            $model = new Product();
        }
        $model->fill($data);
        if($request->hasFile('image')){
            $image = $this->uploadImage($request->file('image'));
            $model->image = $image;
        }

        $model->save();
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
    }

    public function update(Request $request)
    {
    }

    public function destroy(Request $request)
    {
    }

    private function uploadImage($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $path = 'assets/uploads/products';
        $file->move(public_path($path), $fileName);
        return $path.'/'.$fileName;
    }
}
