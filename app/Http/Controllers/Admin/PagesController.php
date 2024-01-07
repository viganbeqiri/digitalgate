<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PageDataTable;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(PageDataTable $dataTable)
    {
        return $dataTable->render('admin.categories.index');
    }

    public function createEdit($id = null)
    {
        $data = [];
        $data = Page::find($id);
        return view('admin.pages.add-edit', [
            'data' => $data
        ]);
    }
}
