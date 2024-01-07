<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortofolioDataTable;
use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index(PortofolioDataTable $dataTable)
    {
        return $dataTable->render('admin.portofolios.index');
    }

    public function createEdit($id = null)
    {
        $data = [];
        $data = Portofolio::find($id);
        return view('admin.portofolios.add-edit', [
            'data' => $data
        ]);
    }
}
