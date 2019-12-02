<?php

namespace App\Http\Controllers;

use App\Model\Servis;
use App\Model\ServisItem;
use Illuminate\Http\Request;
use DataTables;

class ServisItemController extends Controller
{
    public function deviceJson(){
        $data = ServisItem::query();
        return DataTables::of($data)
        ->addColumn('merk', function($data){
            return $data->merk['name'];
        })
        ->addColumn('garansi', function($data){
            return $data->garansi['nama'];
        })
        ->addColumn('kelengkapan', function($data){
            // foreach ($data->kelengkapan as $kelengkapan) {
            //     return $kelengkapan;
            // }
            return $data->kelengkapan['nama'];
        })
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('servis_item.show', $data->id),
                'url_edit' => route('servis_item.edit', $data->id),
                'url_destroy' => route('servis_item.destroy', $data->id),
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
        return view('admin.servis.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new ServisItem();
        return view('admin.servis.formItem', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $servis_id)
    {
        $servis = Servis::find($servis_id);

        $item = new ServisItem();
        $item->merk_id = $request->merk_id;
        // $data->model_id = $request->model_id;
        $item->serial_number = $request->serial_number;
        $item->warna = $request->warna;
        $item->garansi_id = $request->garansi_id;
        $item->keluhan = $request->keluhan;
        $item->biaya = $request->biaya;

        $servis->device()->save($item);

        // Sessions::flash('success', 'Comment Added');
        return redirect()->back()->with('success','Comment Added Successfully');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
