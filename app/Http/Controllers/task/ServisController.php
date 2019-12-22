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

        $this->validate($request,[
        'keterangan' => 'required|max:5000',
        'team_id' => 'required|integer',
        'users_id' => 'required|integer',
        // 'status_id' => 'required',
        // 'kode_servis' => 'required',
        ]);

        // $th = Carbon::now();
        // $nt = 'SE-'.strtoupper(uniqid());
        // $data = [
        //     'keterangan' => $request->keterangan,
        //     'status_id' => 1,
        //     'recieve_at' => $th,
        //     'users_id' => Auth::user()->id,
        //     'team_id' => 1,
        //     'kode_servis' => $nt,
        // ];

        // $item = [
        // 'merk_id' => '1',
        // // $data->model_id = $request->model_id;
        // 'serial_number' => 'SN3121321',
        // 'warna' => 'merah',
        // 'garansi_id' => '1',
        // 'keluhan' => 'ini keluhan saya',
        // 'biaya' => '10000',

        // ];

        // $servis = Servis::create($data);
        // $servis->device()->create($item);


        // $data = new Servis();
        // $data->keterangan = $request->keterangan;
        // $data->status_id = 1;
        // $th = Carbon::now();
        // $data->recieve_at = $th;
        // $data->users_id = $request->users_id;
        // $data->team_id = 1;
        // $nt = 'SE-'.strtoupper(uniqid());
        // $data->kode_servis = $nt;


        // $item = new ServisItem();
        // $item->merk_id = '1';
        // $data->model_id = $request->model_id;
        // $item->serial_number = 'SN3121321';
        // $item->warna = 'merah';
        // $item->garansi_id = '1';
        // $item->keluhan = 'ini keluhan saya';
        // $item->biaya = '10000';


        // $item->kelengkapan()->sync($request->kelengkapan, false);


        // for ($item=0; $item < count($item); $item++) {
        //     if ($item[$item] != '') {
        //         $data->device()->attach($item);
        //     }
        // }

        // $data->save();
        // $data->servis()->create($item);

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
