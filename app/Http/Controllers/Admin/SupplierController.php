<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use DataTables;
use Excel;
use App\Exports\ExportSupplier;

class SupplierController extends Controller
{
    public function dataTable(){
        $data = Supplier::query();
        return DataTables::of($data)
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('supplier.show', $data->id),
                'url_edit' => route('supplier.edit', $data->id),
                'url_destroy' => route('supplier.destroy', $data->id),
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
        // $data = Supplier::query();
        // dd($data);
        return view('admin.supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Supplier();
        return view('admin.supplier.form', compact('model'));
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
            'nama' => 'required|max:25',
            'alamat' => 'required',
            'telepon' => 'required|max:13',
            'website' => 'required',
            'email' => 'required|email|unique:users',
            ]);

            $data = new Supplier();
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->telepon = $request->telepon;
            $data->email = $request->email;
            $data->website = $request->website;
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
        $model = Supplier::findOrFail($id);
        return view('admin.supplier.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Supplier::findOrFail($id);
        return view('admin.supplier.form', compact('model'));
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
            'nama' => 'required|max:25',
            'alamat' => 'required',
            'telepon' => 'required|max:13',
            'website' => 'required',
            'email' => 'required|email|unique:users',
            ]);

        $model = Supplier::findOrFail($id);
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
        $model = Supplier::findOrFail($id);
        $model->delete();
    }
    public function exportExcel() {
        $namafile = 'Supplier'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new ExportSupplier, $namafile);
    }
    public function exportCsv() {
        $namafile = 'Supplier'.date('Y-m-d_H-i-s').'.csv';
        return Excel::download(new ExportSupplier, $namafile);
    }

}
