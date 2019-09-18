<?php

namespace App\Http\Controllers;

use App\Exports\ExportSupplier;
use App\Supplier;
use Illuminate\Http\Request;
use DataTables;
use Excel;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('admin.supplier.index')->withSupplier($supplier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'required|email|unique:users'
            ]);

            $supplier = new Supplier();
            $supplier->nama = $request->nama;
            $supplier->alamat = $request->alamat;
            $supplier->telepon = $request->telepon;
            $supplier->email = $request->email;
            $supplier->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return response()->json($supplier);
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
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if ($supplier->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }

    }
    public function deleteMultiple(Request $request){

        $ids = $request->ids;
        Supplier::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Data Berhasil Di Hapus."]);

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
