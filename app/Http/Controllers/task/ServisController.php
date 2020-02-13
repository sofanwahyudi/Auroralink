<?php

namespace App\Http\Controllers;

use App\Model\Kelengkapan;
use App\Model\Merk;
use Illuminate\Http\Request;
use App\Model\Servis;
use App\Model\ServisItem;
use PDF;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use DB;

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


        $repair = new Servis();
        $repair->kode_servis = 'SE'.strtoupper(uniqid());
        $repair->user_id = $request->user_id;
        $repair->team_id = $request->team_id;
        $repair->recieve_at = Carbon::now();
        $repair->keterangan = $request->keterangan;
        $repair->status_id = 1;

        if($repair->save()){
            $id = $repair->id;
            $merk = 2;
            $garansi = 1;
            $biaya = 100000;
            $sn = 'SN123124323';
            $warna = 'merah';
            $keluhan = 'blank';

            //Tampung di Array
            $servis_detail = array(
                'servis_id' => $id,
                'merk_id' => $merk,
                'model_id' => $merk,
                'serial_number' => $sn,
                'warna' => $warna,
                'garansi_id' => $garansi,
                'keluhan' => $keluhan,
                'biaya' => $biaya,
            );

            //Masukan Database
            if($id = DB::table('item_servis')->insertGetId($servis_detail)){
                $value = [1,2,3,4];
                $dataSet = [];
                foreach ($value as $data) {
                    $dataSet[] = [
                        'servis_item_id'  => $id,
                        'kelengkapan_id'   => $data,
                    ];
                }
                 DB::table('kelengkapan_servis_item')->insert($dataSet);
            }



        }

        return view('admin.servis.index')->with('success','Data Berhasil disimpan');

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
