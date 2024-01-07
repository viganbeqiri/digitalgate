<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.categories.index');
    }

    public function show($id)
    {
    }

    public function dataTable(Request $request)
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $category = Category::find($request->id);
        $category->title = $request->title;
        $category->save();
        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Category updated successfully',
        ]);
    }

    public function createEdit($id = null)
    {
        $data = [];
        $data = Category::find($id);
        return view('admin.categories.add-edit', [
            'data' => $data
        ]);
    }
}
