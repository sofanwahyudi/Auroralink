<?php

namespace App\Http\Controllers;

use App\Model\Part;
use Illuminate\Http\Request;
use Excel;
use App\Exports\ExportPart;
use DataTables;

class PartController extends Controller
{
    public function dataTable(){
        $data = Part::query();
        return DataTables::of($data)
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('part.show', $data->id),
                'url_edit' => route('part.edit', $data->id),
                'url_destroy' => route('part.destroy', $data->id),
            ]);
        })
        ->rawColumns(['index','action'])
        ->addIndexColumn()
        ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Part::all();
        // dd($data);
        return view('admin.part.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Part();
        return view('admin.part.form', compact('model'));
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
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = new Part();
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->harga_jual = $request->harga_jual;
        $data->harga_beli = $request->harga_beli;
        $data->berat = $request->berat;
        $data->kategori_id = $request->kategori_id;
        $data->supplier_id = $request->supplier_id;
        $data->merk_id = $request->merk_id;
        $sku = \DB::table('part')->max('id') + 1;
        $sku = str_pad('S'. $sku, 6, 0 , STR_PAD_LEFT);
        $data->sku = $sku;
        $data->barcode = $sku;
        $data->gambar = null;

        //  if($request->hasFile( 'gambar')){
        //      $data->gambar = '/image/upload/'.str_slug($data->nama).'.'.$request->gambar->getClienOriginalExtension();
        //      $request->gambar->move(public_path('/image/upload'), $data->gambar);
        //  }
        //  ;
        //      $request->file('gambar')->move('image/', $request->file('gambar')->getClientOriginalName());
        //      $data->gambar = $request->file('gambar')->getClientOriginalName();


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
        $model = Part::findOrFail($id);
        return view('admin.part.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Part::findOrFail($id);
        return view('admin.part.form', compact('model'));
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
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $model = Part::findOrFail($id);
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
