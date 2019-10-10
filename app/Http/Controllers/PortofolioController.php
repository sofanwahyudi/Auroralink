<?php

namespace App\Http\Controllers;

use App\Model\Portofolio;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PortofolioController extends Controller
{
    public function dataTable(){
        $data = Portofolio::query();
        return DataTables::of($data)
        ->addColumn('action', function($data){
            return view('layouts._action', [
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
        return view('admin.portofolio.form', compact('model'));
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

            ]);


            $data = new Portofolio();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->url = $request->url;
            $data->gambar = $request->gambar;
            if($request->hasFile( 'gambar')){
                $data->gambar = '/image/upload/'.str_slug($data->title).'.'.$request->gambar->getClienOriginalExtension();
                $request->gambar->move(public_path('/image/upload'), $data->gambar);
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
        return view('admin.portofolio.form', compact('model'));
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

            ]);
            $model = Portofolio::findOrFail($id);
            $model->update($request->all());
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
