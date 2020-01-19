<?php

namespace App\Http\Controllers;

use App\Model\Portofolio;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Image;
use Storage;


class PortofolioController extends Controller
{
    public function dataTable(){
        $data = Portofolio::query();
        return DataTables::of($data)
        ->addColumn('action', function($data){
            return view('layouts.action', [
                'model' => $data,
                'url_show' => route('portofolio.show', $data->id),
                'url_edit' => route('portofolio.edit', $data->id),
                'url_destroy' => route('portofolio.destroy', $data->id),
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
        return view('admin.portofolio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Portofolio();
        return view('admin.portofolio.create', compact('model'));
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


            $data = new Portofolio();
            $data->title = $request->title;
            $slug = $data->title;
            $data->deskripsi = $request->deskripsi;
            $data->url = $request->url;

            if($request->hasFile('gambar')){
                $image = $request->file('gambar');
                $filename = str_slug($slug) . '.' . $image->getClientOriginalExtension();
                $location = public_path('/image/' .$filename);
                Image::make($image)->resize(800, 400)->save($location);
                $data->gambar = $filename;
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
        $model = Portofolio::findOrFail($id);
        // dd($model);
        return view('admin.portofolio.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Portofolio::findOrFail($id);
        return view('admin.portofolio.edit', compact('model'));
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
           // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $model = Portofolio::findOrFail($id);
            $model->title = $request->title;
            $model->deskripsi = $request->deskripsi;
            $slug = $model->title;
            $model->url = $request->url;
            if($request->hasFile('gambar')){
                $image = $request->file('gambar');
                $filename = str_slug($slug) . '.' . $image->getClientOriginalExtension();
                $location = public_path('/image/' .$filename);
                Image::make($image)->resize(800, 400)->save($location);
                $model->gambar = $filename;
                $oldFilename = $model->gambar;
                //Update Image
                $model->gambar;
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
        $model = Portofolio::findOrFail($id);
        $model->delete();
    }
}
