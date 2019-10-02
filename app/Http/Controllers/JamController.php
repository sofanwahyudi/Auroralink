<?php

namespace App\Http\Controllers;

use App\Model\Jam;
use App\Model\Jasa;
use Illuminate\Http\Request;
use DataTables;

class JamController extends Controller
{
    public function dataTable(){
        $data = Jam::all();
        return DataTables::of($data)
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('jam.show', $data->id),
                'url_edit' => route('jam.edit', $data->id),
                'url_destroy' => route('jam.destroy', $data->id),
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
        return view('admin.jasa.jam.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Jasa();
        return view('admin.jasa.jam.form', compact('model'));
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
            'jam_start' => 'required',
            'jam_end' => 'required',
            ]);

            $data = new Jam();
            $data->nama = $request->nama;
            $data->jam_start = $request->jam_start;
            $data->jam_end = $request->jam_end;
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
        $model = Jam::findOrFail($id);
        return view('admin.jasa.jam.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Jam::findOrFail($id);
        return view('admin.jasa.jam.form', compact('model'));
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
            'jam_start' => 'required',
            'jam_end' => 'required',
            ]);

        $model = Jam::findOrFail($id);
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
        $model = Jam::findOrFail($id);
        $model->delete();
    }
}
