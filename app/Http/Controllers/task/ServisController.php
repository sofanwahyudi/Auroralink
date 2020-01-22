<?php

namespace App\Http\Controllers;

use App\Model\Merk;
use Illuminate\Http\Request;
use App\Model\Servis;
use App\Model\ServisItem;
use PDF;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class ServisController extends Controller
{
    public function dataTable(){
        $data = Servis::query();
        return DataTables::of($data)
        ->addColumn('teknisi', function($data){
                return $data->team['nama'];
        })
        ->addColumn('status', function($data){
            return $data->status['name'];
    })
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_print' => route('servis.pdf', $data->id),
                'url_show' => route('servis.show', $data->id),
                'url_edit' => route('servis.edit', $data->id),
                'url_destroy' => route('servis.destroy', $data->id),
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
        return view('admin.servis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Servis();
        $items = new ServisItem();
        $item = ServisItem::all();
        //  dd($item);
        return view('admin.servis.form', compact('model','item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addDevice($servis_id)
    {
        $servis = ServisItem::with($servis_id);
        dd($servis);
        return view('admin.servis.form', compact('servis'));

    }
    public function store(Request $request)
    {
        if (!Auth::check()){
            $request->session()->flash('login', 'Maaf Anda harus login dulu');
            return redirect()->back()->with('danger', 'OPS... sorry you have to register and login first.');
        }

        $servis =[
            'kode_servis' => 'SE'.strtoupper(uniqid()),
            'users_id' => $request->users_id,
            'team_id' => $request->team_id,
            'recieve_at' => Carbon::now(),
            'completed_at' => Carbon::now(),
            'keterangan' => $request->keterangan,
            'status_id' => 1,
            ];

        $servis_detail =[
            'merk_id' => $request->merk_id,
            'serial_number' => $request->serial_number,
            'warna' => $request->warna,
            'garansi_id' => $request->garansi_id,
        ];

        $servis = Servis::create($servis);
        $servis->device()->create($servis_detail);


        return redirect()->back()->withSuccess();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Servis::findOrFail($id);
        return view('admin.servis.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Servis::findOrFail($id);
        return view('admin.servis.form', compact('model'));
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
        $model = Servis::findOrFail($id);
        $model->delete();
    }
    public function getPdf($id)
    {
        $model = Servis::findOrFail($id);

        $pdf = PDF::loadview('tts', compact('model'))->setPaper('a4', 'potrait');

        return $pdf->stream();
    }
}
