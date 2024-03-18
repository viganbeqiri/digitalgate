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

    public function updateOrSave(Request $request)
    {
//        $request->validate([
//            'title' => 'required',
//            'slug' => 'required',
//            'content' => 'required',
//        ]);
//        return ($request->contents[2]['image']);
        $data = $request->all();
        if (isset($data['id']) && $data['id'] != '') {
            $model = Page::find($data['id']);
        } else {
            $model = new Page();
        }
        $model->fill($data);
        $contents = $request->input('contents');

        $contentTemp = [];
        foreach ($contents as $key => $value) {
            $contentTemp[$key] = [
                'title' => $value['title'],
                'description' => $value['description'],
            ];

            if($value['image_changed'] == "true"){
                $image = $this->uploadImage($request->file('contents')[$key]['image']);
                $contentTemp[$key]['image'] = $image;
            }else{
                $contentTemp[$key]['image'] = $value['image'];
            }
        }

        $model->contents = json_encode($contentTemp);

//        return $model;
        $model->save();
        return response()->json([
            'success' => true,
            'message' => 'Page saved successfully',
        ]);
//        return redirect()->back();
    }

    private function uploadImage($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $path = 'assets/uploads/pages';
        $file->move(public_path($path), $fileName);
        return $path.'/'.$fileName;
    }
}
