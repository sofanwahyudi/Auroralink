<?php

namespace App\Http\Controllers;

use App\Model\Kategori;
use Illuminate\Http\Request;
use Excel;
use App\Exports\ExportPartKategori;

class KategoriPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Kategori::all();
        // dd($data);
        return view('admin.part.kategori')->withData($data);
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
        $this->validate($request, [
            'nama' => 'required|max:25',
            'deskripsi' => 'required|max:25',
        ]);

        $data = new Kategori();
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        if ($data->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
        }
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
        //
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
        $this->validate($request, [
            'nama' => 'required|max:25',
            'deskripsi' => 'required|max:25',
        ]);
        $data = Kategori::findOrFail($id);
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;

        if ($data->save()) {
            return redirect()->back()->with('success','Data Berhasil disimpan');
        } else {
            return redirect()->back()->with('danger','Ups... Maaf');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kat = Kategori::find($id);
        if ($kat->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }
    }
    public function deleteMultiple(Request $request){

        $ids = $request->ids;
        Kategori::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Data Berhasil Di Hapus."]);

    }
    public function exportExcel() {
        $namafile = 'Kategori_Part'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new ExportPartKategori, $namafile);
    }

    public function exportCsv() {
        $namafile = 'Kategori_Part'.date('Y-m-d_H-i-s').'.csv';
        return Excel::download(new ExportPartKategori, $namafile);
    }
}
