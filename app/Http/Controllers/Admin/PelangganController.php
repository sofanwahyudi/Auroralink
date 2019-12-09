<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Model\Pelanggan;
use Excel;
use App\Exports\ExportPelanggan;

class PelangganController extends Controller
{
    public function dataTable(){
        $data = Pelanggan::query();
        return DataTables::of($data)
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('pelanggan.show', $data->id),
                'url_edit' => route('pelanggan.edit', $data->id),
                'url_destroy' => route('pelanggan.destroy', $data->id),
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
        return view('admin.pelanggan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Pelanggan();
        return view('admin.pelanggan.form', compact('model'));
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
            'name' => 'required|max:25',
            'telepon' => 'required|max:13',
            'alamat' => 'required|max:255',
            'email' => 'required|email|unique:users',
            ]);
            $data = new Pelanggan();
            $data->name = $request->name;
            $data->telepon = $request->telepon;
            $data->email = $request->email;
            $data->alamat = $request->alamat;
            $data->users_id = 2;
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
        $model = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.form', compact('model'));
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
            'name' => 'required|max:25',
            'telepon' => 'required|max:13',
            'alamat' => 'required|max:255',
            'email' => 'required|email|unique:users',
            ]);
        $model = Pelanggan::findOrFail($id);
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
        $model = Pelanggan::findOrFail($id);
        $model->delete();
    }
    public function exportExcel() {
        $namafile = 'Data_pelanggan'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new ExportPelanggan, $namafile);
    }
    public function exportCsv() {
        $namafile = 'Data_pelanggan'.date('Y-m-d_H-i-s').'.csv';
        return Excel::download(new ExportPelanggan, $namafile);
    }
}
