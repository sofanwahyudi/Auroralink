<?php

namespace App\Http\Controllers;

use App\Exports\ExportLeads;
use App\Model\Leads;
use Illuminate\Http\Request;
use DataTables;
use Excel;

class LeadsController extends Controller
{
    public function dataTable(){
        $data = Leads::query();
        return DataTables::of($data)
        ->escapeColumns('komentar')
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('leads.show', $data->id),
                'url_edit' => route('leads.edit', $data->id),
                'url_destroy' => route('leads.destroy', $data->id),
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
        return view('admin.leads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Leads();
        return view('admin.leads.form', compact('model'));
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
        'nama' => 'required|max:25',
        'telepon' => 'required|max:13',
        'komentar' => 'required|max:255',
        'email' => 'required|email|unique:users',
        ]);
        $data = new Leads();
        $data->nama = $request->nama;
        $data->telepon = $request->telepon;
        $data->email = $request->email;
        $data->komentar = $request->komentar;
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
        $model = Leads::findOrFail($id);
        return view('admin.leads.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Leads::findOrFail($id);
        return view('admin.leads.form', compact('model'));
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
        'nama' => 'required|max:25',
        'telepon' => 'required|max:13',
        'komentar' => 'required|max:255',
        'email' => 'required|email|unique:users',
        ]);
    $model = Leads::findOrFail($id);
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
        $model = Leads::findOrFail($id);
        $model->delete();
    }
    public function exportExcel() {
        $namafile = 'Leads'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new ExportLeads, $namafile);
    }
    public function exportCsv() {
        $namafile = 'Leads'.date('Y-m-d_H-i-s').'.csv';
        return Excel::download(new ExportLeads, $namafile);
    }
}
