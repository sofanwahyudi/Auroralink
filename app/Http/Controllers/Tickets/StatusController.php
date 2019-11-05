<?php

namespace App\Http\Controllers;

use App\Model\Tickets\Status;
use Illuminate\Http\Request;
use DataTables;

class StatusController extends Controller
{
    public function dataTable()
    {
        $model = Status::query();
        return DataTables::of($model)
        ->addColumn('action', function($model){
            return view('layouts._action', [
                'model' => $model,
                'url_show' => route('status.show', $model->id),
                'url_edit' => route('status.edit', $model->id),
                'url_destroy' => route('status.destroy', $model->id),
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
        return view('admin.tickets.status.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Status();
        return view('admin.tickets.status.form', compact('model'));
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
            'name' => 'required|max:255',
            'color' => 'required|max:255',
            ]);

            $data = new Status();
            $data->name = $request->name;
            $data->color = $request->color;
            $data->save();

            return redirect()->back()->with('success','Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Status::findOrFail($id);
        return view('admin.tickets.status.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Status::findOrFail($id);
        return view('admin.tickets.status.form', compact('model'));
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
        $model = Status::findOrFail($id);
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
        $model = Status::findOrFail($id);
        $model->delete();
    }
}
