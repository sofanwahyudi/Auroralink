<?php

namespace App\Http\Controllers;

use App\Exports\ExportSupplier;
use App\Supplier;
use Illuminate\Http\Request;
use DataTables;
use Excel;

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
        // $supplier = Supplier::all();
        // return view('admin.supplier.index')->withSupplier($supplier);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'telepon' => 'required',
            'email' => 'required|email|unique:users'
            ]);

            $supplier = new Supplier();
            $supplier->nama = $request->nama;
            $supplier->alamat = $request->alamat;
            $supplier->telepon =$request->telepon;
            $supplier->email = $request->email;
            $supplier->website = $request->website;
            $supplier->save();
            return redirect()->back()->with('success','Data Berhasil disimpan');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteApi($id)
    {

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
            'alamat' => 'required|max:255',
            'telepon' => 'required',
            'email' => 'required|string|max:255|email|unique:users,email'
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
    public function deleteMultiple(Request $request){

        $ids = $request->ids;
       $supp = Supplier::whereIn('id',explode("id",$ids));
       if($supp->delete()){
        return response()->json(['success'=>"Data Berhasil Di Hapus."]);
       }

    }
    public function exportExcel() {
        $namafile = 'Supplier'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new ExportSupplier, $namafile);
    }

    public function exportCsv() {
        $namafile = 'Supplier'.date('Y-m-d_H-i-s').'.csv';
        return Excel::download(new ExportSupplier, $namafile);
    }


    public function getIndexApi(){

        $supp = Supplier::all();
        if(count($supp)>1){
            $res['message']="Sukses!";
            $res['value']=$supp;
            return response($res);
        }else{
            $res['message']= "Kosong!";
            return response(json_encode($res));
        }
    }

}
