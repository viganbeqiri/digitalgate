<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TeamDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index(TeamDataTable $datatable)
    {
        return $datatable->render('admin.teams.index');
    }

    public function createEdit($id = null)
    {
        $data = [];
        $data = \App\Models\Team::find($id);
        return view('admin.teams.add-edit', [
            'data' => $data
        ]);
    }
}
