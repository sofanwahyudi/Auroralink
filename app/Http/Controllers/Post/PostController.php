<?php

namespace App\Http\Controllers;

use App\Model\Post;
use App\Model\Tags;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;
use Storage;
use Illuminate\Support\Facades\Auth;
use Purifier;

class PostController extends Controller
{
    public function dataTable(){
        $data = Post::query();
        return DataTables::of($data)
        ->addColumn('tags', function($data){
            foreach ($data->tags as $tags) {
                return $tags->tags;
            }
        })
        ->addColumn('kategori', function($data){
                return $data->kategori['category'];
        })
        ->addColumn('author', function($data){
            return $data->users['name'];
        })
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
        $tags = Tags::all();
        return view('admin.post.form')->withModel($model)->withTags($tags);
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
            // 'slug' => 'required|string|min:5|unique:post',
            'category_id' => 'required|integer',
        //    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $data = new Post();
            $data->title = $request->title;
            $data->content = Purifier::clean($request->content);
            $title = $data->title;
            $slug = str_slug($title,'-');
            $data->slug = $slug;
            $data->category_id = $request->category_id;
            $currentuser = Auth::user()->id;
            $data->users_id = $currentuser;

            if($request->file( 'image')){
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('/image/upload/' .$filename);
                Image::make($image)->resize(800, 400)->save($location);
                // $data->image = '/image/upload/'.str_slug($data->title).'.'.$request->image->getClienOriginalExtension();
                // $request->image->move(public_path('/image/upload'), $data->image);
                $data->image = $filename;
            }

            $data->save();


            $data->tags()->sync($request->tags, false);

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
        $tags = Tags::all();
        // foreach ($tags as $tag) {
        //     $tags2[$tags] = $tag->tags;
        // }
        // dd($tag);
        return view('admin.post.form', compact('model','tags'));
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
            ]);

        $model = Post::findOrFail($id);
        $model->title = $request->title;
        $model->content = Purifier::clean($request->content);
        $title = $model->title;
        $slug = str_slug($title,'-');
        $model->slug = $slug;
        $model->category_id = $request->category_id;
        $currentuser = Auth::user()->id;
        $model->users_id = $currentuser;

        if($request->hasFile( 'feature_image')){
            $image = $request->file('feature_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/image/upload/' .$filename);
            Image::make($image)->resize(800, 400)->save($location);
            $model->image = $filename;
            $oldFilename = $model->image;
            //Update Image
            $model->image;
            // Delete Image
            Storage::delete($oldFilename);
        }

        $model->save();

        if (isset($request->tags)) {
            $model->tags()->sync($request->tags);
        } else {
            $model->tags()->sync(array());
        }

        // $model->tags()->sync($request->tags, false);
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
        // $model->tags()->deatach();
        Storage::delete($model->image);
        $model->delete();
    }
}
