<?php

namespace App\Http\Controllers;

use App\Model\Tickets\Tickets;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TicketsController extends Controller
{
    public function dataTable()
    {
        $model = Tickets::query();
        return DataTables::of($model)
        ->addColumn('status', function($data){
            return $data->status['name'];
        })
        ->addColumn('category', function($data){
            return $data->category['name'];
        })
        ->addColumn('priority', function($data){
            return $data->priority['name'];
        })
        ->addColumn('users', function($data){
            return $data->users['name'];
        })
        ->addColumn('team', function($data){
            return $data->team['nama'];
        })
        ->addColumn('action', function($model){
            return view('layouts._action', [
                'model' => $model,
                'url_show' => route('tickets.show', $model->id),
                'url_edit' => route('tickets.edit', $model->id),
                'url_destroy' => route('tickets.destroy', $model->id),
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
        return view('admin.tickets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Tickets();
        return view('admin.tickets.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()){
            $request->session()->flash('login', 'Maaf Anda harus login dulu');
            return redirect()->back()->with('danger', 'OPS... sorry you have to register and login first.');
        }

        $this->validate($request,[
        'subject' => 'required|max:255',
        'content' => 'required|max:5000',
        ]);

        $data = new Tickets();
        $data->subject = $request->subject;
        $data->content = $request->content;
        $data->status_id = 1;
        $data->priority_id = $request->priority_id;
        $data->cats_id = $request->cats_id;
        $currentuser = Auth::user()->id;
        $data->users_id = $currentuser;
        $data->team_id = 1;
        $nik = \DB::table('tickets')->max('id');
        $th = Carbon::now();
        $bulan = $th->format('m');
        $nt = str_pad( 'TCKT'. $bulan . $nik, 8, 0 , STR_PAD_RIGHT);
        $data->no_ticket = $nt;
        $slug = str_slug($nt,'-');
        $data->slug = $slug;
        $data->save();

        return redirect()->back()->with('success','Ticket Added Successfully with no.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Tickets::findOrFail($id);
        return view('admin.tickets.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Tickets::findOrFail($id);
        return view('admin.tickets.form', compact('model'));
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
        // if (!Auth::check()){
        //     $request->session()->flash('login', 'Maaf Anda harus login dulu');
        //     return redirect()->back()->with('danger', 'OPS... sorry you have to register and login first.');
        // }

        $this->validate($request,[
        'subject' => 'required|max:255',
        'content' => 'required|max:5000',
        ]);

        $data = Tickets::findOrFail($id);
        $data->subject = $request->subject;
        $data->content = $request->content;
        $data->status_id = $request->status_id;
        $data->priority_id = $request->priority_id;
        $data->cats_id = $request->cats_id;
        $data->save();

        return redirect()->back()->with('success','Ticket Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Tickets::findOrFail($id);
        $model->delete();
    }
}
