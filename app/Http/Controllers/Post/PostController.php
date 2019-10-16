<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    public function dataTable(){
        $data = Post::query();
        return DataTables::of($data)
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('post.show', $data->id),
                'url_edit' => route('post.edit', $data->id),
                'url_destroy' => route('post.destroy', $data->id),
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
        return view('admin.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Post();
        return view('admin.post.form', compact('model'));
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
            'title' => 'required|string|min:10',
            'content' => 'required|string|min:30',
            'slug' => 'required|string|min:5|unique:slug',
            ]);

            $data = new Post();
            $data->title = $request->title;
            $data->content = $request->content;
            $data->slug = $request->slug;
            $data->category_id = $request->category_id;
            if($request->hasFile( 'image')){
                $data->image = '/image/upload/'.str_slug($data->title).'.'.$request->image->getClienOriginalExtension();
                $request->image->move(public_path('/image/upload'), $data->image);
            }
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
        $model = Post::findOrFail($id);
        dd($model->categories);
        return view('admin.post.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Post::findOrFail($id);
        return view('admin.post.form', compact('model'));
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
            'title' => 'required|string|min:10',
            'content' => 'required|string|min:30',
            'slug' => 'required|string|min:5|unique:slug',
            ]);

        $model = Post::findOrFail($id);
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
        $model = Post::findOrFail($id);
        $model->delete();
    }
}
