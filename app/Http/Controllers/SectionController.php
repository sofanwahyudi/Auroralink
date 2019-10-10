<?php

namespace App\Http\Controllers;

use App\Model\Section;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SectionController extends Controller
{
    public function dataTable(){
        $data = Section::query();
        return DataTables::of($data)
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('sections.show', $data->id),
                'url_edit' => route('sections.edit', $data->id),
                'url_destroy' => route('sections.destroy', $data->id),
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['checkbox','action'])
        ->escapeColumns('content')
        ->make(true);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.section.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Section();
        return view('admin.section.form', compact('model'));
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
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',

            ]);


            $data = new Section();
            $data->title = $request->title;
            $data->sub_title = $request->sub_title;
            $data->content = $request->content;
            if($request->hasFile( 'image')){
                $data->foto = '/image/upload/'.str_slug($data->title).'.'.$request->image->getClienOriginalExtension();
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
        $model = Section::findOrFail($id);
        // dd($model);
        return view('admin.section.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Section::findOrFail($id);
        return view('admin.section.form', compact('model'));
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
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',

            ]);
            $model = Section::findOrFail($id);
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
        $model = Section::findOrFail($id);
        $model->delete();
    }
}
