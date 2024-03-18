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

    public function updateOrSave(Request $request)
    {
        $data = $request->all();
        if (isset($data['id']) && $data['id'] != '') {
            $model = \App\Models\Team::find($data['id']);
        } else {
            $model = new \App\Models\Team();
        }
//        dd($request->all());

        if ($request->hasFile('image')) {
            $image = $this->uploadImage($request->file('image'));
            $data['image'] = $image;
        }

        $model->fill($data);
        $model->save();
        return redirect()->route('admin.teams.index');
    }

    private function uploadImage($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $path = 'assets/uploads/team';
        $file->move(public_path($path), $fileName);
        return $path.'/'.$fileName;
    }
}
