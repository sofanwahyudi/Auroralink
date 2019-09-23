<?php

namespace App\Http\Controllers;

use App\Model\Part;
use Illuminate\Http\Request;
use Excel;
use App\Exports\ExportPart;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Part::all();
        return view('admin.part.index')->withData($data);
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
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = new Part();
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->harga_jual = $request->harga_jual;
        $data->harga_beli = $request->harga_beli;
        $data->berat = $request->berat;
        $data->kategori_id = $request->kategori_id;
        $data->supplier_id = $request->supplier_id;
        $sku = \DB::table('part')->max('id') + 1;
        $sku = str_pad($sku, 6, 0 , STR_PAD_LEFT);
         $data->sku = $sku;
         $data->barcode = $sku;

         if($request->hasFile('gambar'));
             $request->file('gambar')->move('image/', $request->file('gambar')->getClientOriginalName());
             $data->gambar = $request->file('gambar')->getClientOriginalName();


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
        // $this->validate($request, [
        //     'nama' => 'required|max:25',
        //     'deskripsi' => 'required|max:255',
        //     'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //    ]);

            $data = Part::findOrFail($id);
            $data->nama = $request->nama;
            $data->deskripsi = $request->deskripsi;
            $data->harga_jual = $request->harga_jual;
            $data->harga_beli = $request->harga_beli;
            $data->berat = $request->berat;
            $data->kategori_id = $request->kategori_id;
            $data->supplier_id = $request->supplier_id;
            $image = $request->file('gambar');

         if ($image != '') {
             $image->move('image/', $image->getClientOriginalName());
             $data->gambar = $image->getClientOriginalName();
         } else {
            //  $request->validate([
            //      'nama' => 'required|max:25',
            //      'deskripsi' => 'required|max:255',
            //  ]);
         }


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
        $part = Part::find($id);
        if ($part->delete()) {
            return redirect()->back()->with('success','Data Berhasil dihapus');
        } else {
            return redirect()->back()->with('danger','Ups...');
        }
    }
    public function deleteMultiple(Request $request){

        $ids = $request->ids;
        Part::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Data Berhasil Di Hapus."]);

    }
    public function exportExcel() {
        $namafile = 'Part'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new ExportPart, $namafile);
    }

    public function exportCsv() {
        $namafile = 'Part'.date('Y-m-d_H-i-s').'.csv';
        return Excel::download(new ExportPart, $namafile);
    }
}
