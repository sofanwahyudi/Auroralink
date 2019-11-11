<?php

namespace App\Http\Controllers;

use App\Model\Jasa;
use Illuminate\Http\Request;
use DataTables;
use Image;

class JasaController extends Controller
{
    public function dataTable(){
        $model = Jasa::query();
        return DataTables::of($model)
        ->escapeColumns('deskripsi')
        ->addColumn('action', function($model){
            return view('layouts._action', [
                'model' => $model,
                'url_show' => route('jasa.show', $model->id),
                'url_edit' => route('jasa.edit', $model->id),
                'url_destroy' => route('jasa.destroy', $model->id),
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['checkbox','action'])
        ->make(true);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jasa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Jasa();
        return view('admin.jasa.form', compact('model'));
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
        'nama' => 'required|max:255',
        'deskripsi' => 'required|max:255',
        'harga' => 'required|max:25',
        'jam_id' => 'required',
        'fitur' => 'required|max:5000',
        'benefit' => 'required|max:500',
        'harga' => 'required',
        'job_id' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = new Jasa();
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->fitur = $request->fitur;
        $data->benefit = $request->benefit;
        $data->jam_id = $request->jam_id;
        $data->job_id = $request->job_id;
        $tl = $data->nama;
        $slug = str_slug($tl,'-');
        $data->slug = $slug;

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
        $model = Jasa::findOrFail($id);
        return view('admin.jasa.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Jasa::findOrFail($id);
        return view('admin.jasa.form', compact('model'));
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
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'harga' => 'required|max:25',
            'jam_id' => 'required',
            'fitur' => 'required|max:5000',
            'benefit' => 'required|max:5000',
            'harga' => 'required',
            'job_id' => 'required',
            'slug' => 'required'
            // 'gambar' => 'required',
            ]);

            $model = Jasa::findOrFail($id);
            $model->nama = $request->nama;
            $model->deskripsi = $request->deskripsi;
            $model->harga = $request->harga;
            $model->fitur = $request->fitur;
            $model->benefit = $request->benefit;
            $model->jam_id = $request->jam_id;
            $model->job_id = $request->job_id;
            $tl = $model->nama;
            $slug = str_slug($tl,'-');
            $model->slug = $slug;
            $model->save();

            return redirect()->back()->with('success','Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Jasa::findOrFail($id);
        $model->delete();
    }
}
