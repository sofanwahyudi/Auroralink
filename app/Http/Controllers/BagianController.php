<?php

namespace App\Http\Controllers;

use App\Model\Bagian;
use Illuminate\Http\Request;
use DataTables;

class BagianController extends Controller
{
    public function dataTable(){
        $data = Bagian::query();
        return DataTables::of($data)
        ->addColumn('devisi', function($d){
            return $d->devisi->name;
        })
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('bagian.show', $data->id),
                'url_edit' => route('bagian.edit', $data->id),
                'url_destroy' => route('bagian.destroy', $data->id),
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
        return view('admin.team.bagian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Bagian();
        return view('admin.team.bagian.form', compact('model'));
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
            'devisi_id' => 'required',

            ]);


            $data = new Bagian();
            $data->nama = $request->nama;
            $data->devisi_id = $request->devisi_id;
            // $data->devisi()->associate($devisi);
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
        $model = Bagian::findOrFail($id);
        return view('admin.team.bagian.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Bagian::findOrFail($id);
        return view('admin.team.bagian.form', compact('model'));
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
            ]);

            $model = Bagian::findOrFail($id);
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
        $model = Bagian::findOrFail($id);
        $model->delete();
    }
}
