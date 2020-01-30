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
            return view('layouts.action', [
                'model' => $data,
                'url_show' => url('/blog/read/post', $data->slug),
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
        // $model = new Post();
        // $tags = Tags::all();
        // return view('admin.post.create')->withModel($model)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $model = new Post();
        $tags = Tags::all();
        return view('admin.post.create')->withModel($model)->withTags($tags);
    }
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
                $filename = str_slug($slug) . '.' . $image->getClientOriginalExtension();
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
    public function upload(Request $request)
    {
        // Allowed origins to upload images
        $accepted_origins = array("http://localhost", "https://auroralink.co.id");
        // Images upload path
            $imageFolder = "images/";

            reset($_FILES);
            $temp = current($_FILES);
            if(is_uploaded_file($temp['tmp_name'])){
                if(isset($_SERVER['HTTP_ORIGIN'])){
                    // Same-origin requests won't set an origin. If the origin is set, it must be valid.
                    if(in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)){
                        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
                    }else{
                        header("HTTP/1.1 403 Origin Denied");
                        return;
                    }
                }

                // Sanitize input
                if(preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])){
                    header("HTTP/1.1 400 Invalid file name.");
                    return;
                }

                // Verify extension
                if(!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))){
                    header("HTTP/1.1 400 Invalid extension.");
                    return;
                }

                // Accept upload if there was no origin, or if it is an accepted origin
                $filetowrite = $imageFolder . $temp['name'];
                move_uploaded_file($temp['tmp_name'], $filetowrite);

                // Respond to the successful upload with JSON.
                echo json_encode(array('location' => $filetowrite));
            } else {
                // Notify editor that the upload failed
                header("HTTP/1.1 500 Server Error");
            }
    }
    public function edit($id)
    {
        $model = Post::findOrFail($id);
       // $tags = $model->tags();
        // foreach ($tags as $tag) {
        //     $tags2[$tags] = $tag->tags;
        // }
        // dd($model->tags());
        return view('admin.post.edit', compact('model'));
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
        // $title = $model->title;
         $oldslug = $model->slug;
        // $model->slug = $slug;
        $model->category_id = $request->category_id;
        $currentuser = Auth::user()->id;
        $model->users_id = $currentuser;

        if($request->hasFile( 'image')){
            $image = $request->file('image');
            $filename = str_slug($oldslug) . '.' . $image->getClientOriginalExtension();
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
        return redirect()->back()->with('success','Data Berhasil diupdate');

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
