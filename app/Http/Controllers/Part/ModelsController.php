<?php

namespace App\Http\Controllers;

use App\Model\Models;
use Illuminate\Http\Request;
use DataTables;

class ModelsController extends Controller
{
    public function dataTable(){
        $data = Models::query();
        return DataTables::of($data)
        ->addColumn('merk', function($d){
            return $d->merk->name;
        })
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('models.show', $data->id),
                'url_edit' => route('models.edit', $data->id),
                'url_destroy' => route('models.destroy', $data->id),
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
        return view('admin.part.model.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Models();
        return view('admin.part.model.form', compact('model'));
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
            ]);

            $data = new Models();
            $data->name = $request->name;
            $data->merk_id = $request->merk_id;
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
        $model = Models::findOrFail($id);
        return view('admin.part.model.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Models::findOrFail($id);
        return view('admin.part.model.form', compact('model'));
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
            'merk_id' => 'required',
            ]);

            $model = Models::findOrFail($id);
            $model->name = $request->name;
            $model->merk_id = $request->merk_id;
            $model->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Models::findOrFail($id);
        $model->delete();
    }
}
