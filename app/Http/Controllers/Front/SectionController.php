<?php

namespace App\Http\Controllers;

use App\Model\Section;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Image;
use Storage;

class SectionController extends Controller
{
    public function dataTable(){
        $data = Section::query();
        return DataTables::of($data)
        ->addColumn('action', function($data){
            return view('layouts.action', [
                'model' => $data,
                'url_show' => route('sections.show', $data->id),
                'url_edit' => route('sections.edit', $data->id),
                'url_destroy' => route('sections.destroy', $data->id),
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['checkbox','action'])
        ->escapeColumns('content')
        ->make(true);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.section.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Section();
        return view('admin.section.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            $data = new Section();
            $data->title = $request->title;
            $data->sub_title = $request->sub_title;
            $slug = $data->sub_title;
            $data->content = $request->content;
            if($request->file('image')){
                $image = $request->file('image');
                $filename = str_slug($slug) . '.' . $image->getClientOriginalExtension();
                $location = public_path('/image/' .$filename);
                Image::make($image)->resize(500, 300)->save($location);
                // $data->image = '/image/upload/'.str_slug($data->title).'.'.$request->image->getClienOriginalExtension();
                // $request->image->move(public_path('/image/upload'), $data->image);
                $data->image = $filename;
            }

            $data->save();

            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Section::findOrFail($id);
        // dd($model);
        return view('admin.section.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Section::findOrFail($id);
        return view('admin.section.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $model = Section::findOrFail($id);
            $model->title = $request->title;
            $model->sub_title = $request->sub_title;
            $slug = $model->sub_title;
            $model->content = $request->content;
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = str_slug($slug) . '.' . $image->getClientOriginalExtension();
                $location = public_path('/image/' .$filename);
                Image::make($image)->resize(800, 400)->save($location);
                $model->image = $filename;
                $oldFilename = $model->image;
                //Update Image
                $model->image;
                // Delete Image
                Storage::delete($oldFilename);
            }

            $model->save();
            return redirect()->back()->with('success','Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Section::findOrFail($id);
        $model->delete();
    }
}
