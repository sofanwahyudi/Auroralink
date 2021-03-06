<?php

namespace App\Http\Controllers;

use App\Model\Devisi;
use App\Model\Bagian;
use Illuminate\Http\Request;
use DataTables;

class DevisiController extends Controller
{
    public function dataTable(){
        $data = Devisi::query();
        return DataTables::of($data)
        ->addColumn('bagian', function($d){
            return $d->bagian->count();
        })
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('devisi.show', $data->id),
                'url_edit' => route('devisi.edit', $data->id),
                'url_destroy' => route('devisi.destroy', $data->id),
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
        // $data = Devisi::all();
        // dd($data);
        return view('admin.team.devisi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Devisi();
        return view('admin.team.devisi.form', compact('model'));
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
            'name' => 'required|max:255',
            'keterangan' => 'required|max:255',

            ]);

            $data = new Devisi();
            $data->name = $request->name;
            $data->keterangan = $request->keterangan;

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
        $model = Devisi::findOrFail($id);
        $dev = Devisi::find(1);
        return view('admin.team.devisi.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Devisi::findOrFail($id);
        return view('admin.team.devisi.form', compact('model'));
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
            'name' => 'required|max:255',
            'keterangan' => 'required|max:255',
            ]);

            $model = Devisi::findOrFail($id);
            $model->name = $request->name;
            $model->keterangan = $request->keterangan;
            $model->bagian(explode(',', $request->bagian_id));
            $model->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Devisi::findOrFail($id);
        $model->delete();
    }
}
