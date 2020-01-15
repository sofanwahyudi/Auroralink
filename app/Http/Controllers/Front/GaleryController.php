<?php

namespace App\Http\Controllers;

use App\Model\Galery;
use App\Model\Job;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Image;
use Storage;

class GaleryController extends Controller
{
    public function dataTable(){
        $data = Galery::query();
        return DataTables::of($data)
        ->addColumn('action', function($data){
            return view('layouts.action', [
                'model' => $data,
                'url_show' => route('galery.show', $data->id),
                'url_edit' => route('galery.edit', $data->id),
                'url_destroy' => route('galery.destroy', $data->id),
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
        return view('admin.galery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Galery();
        $job = Job::all();
        return view('admin.galery.create')->withJob($job)->withModel($model);
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
            'deskripsi' => 'required|max:255',
            'url' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $data = new Galery();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->url = $request->url;
            $data->job_id = $request->job_id;

            if($request->file('gambar')){
                $image = $request->file('gambar');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('/image/' .$filename);
                Image::make($image)->resize(500, 300)->save($location);
                $data->gambar= $filename;
            }

            $data->save();

            return redirect()->back()->with('success','Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Galery::findOrFail($id);
        return view('admin.galery.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Galery::findOrFail($id);
        $job = Job::all();
        return view('admin.galery.edit')->withModel($model)->withJob($job);
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
            'deskripsi' => 'required|max:255',
            'url' => 'required',
        //    'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $data = Galery::findOrFail($id);
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->url = $request->url;
            $data->job_id = $request->job_id;

            if($request->file('gambar')){
                $image = $request->file('gambar');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('/image/' .$filename);
                Image::make($image)->resize(500, 300)->save($location);
                $data->gambar= $filename;
                $oldFilename = $data->gambar;
                //Update Image
                $data->gambar;
                // Delete Image
                Storage::delete($oldFilename);
            }


            $data->save();

            return redirect()->back()->with('success','Data Berhasil disimpan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Galery::findOrFail($id);
        $model->delete();
    }
}
