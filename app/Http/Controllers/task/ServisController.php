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
    public function dataTable()
    {
        $data = Servis::query();
        return DataTables::of($data)
            ->addColumn('teknisi', function ($data) {
                return $data->team['nama'];
            })
            ->addColumn('pelanggan', function ($data) {
                return $data->pelanggan['name'];
            })
            ->addColumn('status', function ($data) {
                return $data->status['name'];
            })
            ->addColumn('action', function ($data) {
                return view('layouts._action', [
                    'model' => $data,
                    'url_print' => route('servis.pdf', $data->id),
                    'url_show' => route('servis.show', $data->id),
                    'url_edit' => route('servis.edit', $data->id),
                    'url_destroy' => route('servis.destroy', $data->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'action'])
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
        $kelengkapan = Kelengkapan::all();
        $id = DB::table('servis')->orderBy('id', 'desc')->first();
        $c = $id->id;
        $kode = 'SE' . $c . strtoupper(uniqid());
       // dd($kode);
        return view('admin.servis.form', compact('model', 'item','kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if (!Auth::check()) {
            $request->session()->flash('login', 'Maaf Anda harus login dulu');
            return redirect()->back()->with('danger', 'OPS... sorry you have to register and login first.');
        }
        $repair = new Servis();
        $repair->kode_servis = 'SE' . strtoupper(uniqid());
        $repair->pelanggan_id = $request->pelanggan_id;
        $repair->team_id = $request->team_id;
        $repair->recieve_at = Carbon::now();
        $repair->keterangan = $request->keterangan;
        $repair->status_id = 1;

        if ($repair->save()) {

            // for($x = 0; $x < count($list); $x++){
            //     $data[] = array(
            //         'servis_id' => $repair->id,
            //         'merk_id' => $list[$x]['merk_id'],
            //         'model_id' => list[$x]['model_id'],
            //         'serial_number' => $list[$x]['serial_number'],
            //         'warna' => $list[$x]['warna'],
            //         'garansi_id' => $list[$x]['garansi_id'],
            //         'keluhan' => $list[$x]['keluhan'],
            //         'biaya' => $list[$x]['biaya'],
            //     )
            // }

            // try{
            //     for($x = 0; $x < count($list); $x++){
            //         DB::table('item_servis')->insertGetId($list[$x])
            //     }
            // }
            //Data Dari Inputan
            $item[] = [
                'merk_id' => $request->merk,
                'model_id' => $request->merk,
                'garansi_id' => $request->garansi,
                'biaya' => 0,
                'serial_number' => $request->sn,
                'warna' => $request->warna,
                'keluhan' => 'blank',
            ];
            //dd($item);
            //Looping Data Inputan
            foreach ($item as $val) {
                $servis_detail = [
                    'servis_id' => $repair->id,
                    'merk_id' => $val['merk_id'],
                    'model_id' => $val['model_id'],
                    'serial_number' => $val['serial_number'],
                    'warna' => $val['warna'],
                    'garansi_id' => $val['garansi_id'],
                    'keluhan' => $val['keluhan'],
                    'biaya' => $val['biaya'],
                ];
            }

            //dd($servis_detail);
            //Masukan Database
            if($ids = DB::table('item_servis')->insertGetId($servis_detail))
            {
                $value = [
                    'kelengkapan_id' => $request->kelengkapan,
                ];
             //   dd($ids);
                $dataSet = [];
                foreach($value as $data){
                    $dataSet = array(
                        $dataSet['servis_item_id']  = $ids,
                        $dataSet['kelengkapan_id']   = $data,
                    );
                }
                dd($dataSet);
                DB::table('kelengkapan_servis_item')->insert($dataSet);
            }
        }

        return view('admin.servis.index')->with('success', 'Data Berhasil disimpan');
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
