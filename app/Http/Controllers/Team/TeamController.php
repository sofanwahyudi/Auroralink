<?php

namespace App\Http\Controllers;

use App\Model\Devisi;
use App\Model\Team;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

class TeamController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function dataTable(){
        $data = Team::query();
        return DataTables::of($data)
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('team.show', $data->id),
                'url_edit' => route('team.edit', $data->id),
                'url_destroy' => route('team.destroy', $data->id),
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
        // $data = Team::all();
        // dd($data);
        return view('admin.team.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Team();
        $s = Devisi::all()->where('bagian_id','=','0');
        return view('admin.team.form', compact('model'));
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
            'alamat' => 'required|max:125',
            'telepon' => 'required|max:13',
            'email' => 'required|email|unique:users',
            'devisi_id' => 'required',
            'bagian_id' => 'required',
            'users_id' => 'required',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = new Team();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->telepon = $request->telepon;
        $data->devisi_id = $request->devisi_id;
        $data->bagian_id = $request->bagian_id;
        $data->users_id = $request->users_id;
        $nik = \DB::table('team')->max('id');
        $th = Carbon::now();
        $tahun = $th->format('Y');
        $nik = str_pad( $tahun . $nik, 8, 0 , STR_PAD_RIGHT);
        $data->nik = $nik;
        $data->foto = null;

         if($request->hasFile( 'foto')){
             $data->foto = '/image/upload/'.str_slug($data->nama).'.'.$request->foto->getClienOriginalExtension();
             $request->foto->move(public_path('/image/upload'), $data->foto);
         }
         $data->save();
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Team::findOrFail($id);
              return view('admin.team.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Team::findOrFail($id);
        return view('admin.team.form', compact('model'));
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
            'alamat' => 'required|max:125',
            'telepon' => 'required|max:13',
            'email' => 'required|email|unique:users',
            'devisi_id' => 'required',
            'users_id' => 'required',
            'bagian_id' => 'required',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $model = Team::findOrFail($id);
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
        $model = Team::findOrFail($id);
        $model->delete();
    }
}
