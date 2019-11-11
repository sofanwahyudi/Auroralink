<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comment;
use App\Model\Post;
use App\Model\Tickets\Tickets;
use DataTables;
use Auth;


class CommentController extends Controller
{

    public function dataTable(){
        $data = Comment::query();
        return DataTables::of($data)
        ->escapeColumns('komentar')
        ->addColumn('post', function($data){
            return $data->commentable_type;
        })
        ->addColumn('users', function($data){
            return $data->users['name'];
        })
        ->addColumn('action', function($data){
            return view('layouts._action', [
                'model' => $data,
                'url_show' => route('comments.show', $data->id),
                'url_edit' => route('comments.edit', $data->id),
                'url_destroy' => route('comments.destroy', $data->id),
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
        return view('admin.post.comments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Comment();
        return view('admin.post.comments.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id )
    {
        if (!Auth::check()){
            $request->session()->flash('login', 'Maaf Anda harus login dulu supaya bisa koment');
            return redirect()->back()->with('danger', 'OPS... sorry you have to register and login first before you can comment. #cmiw');
        }


    	$request->validate([
            // 'name' => 'required',
            'body' => 'required',
            // 'email' => 'required|email|unique:users',
        ]);

        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->users_id = Auth::user()->id;

        $post->comments()->save($comment);

        // Sessions::flash('success', 'Comment Added');
        return redirect()->back()->with('success','Comment Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Comment::findOrFail($id);
        return view('admin.post.comments.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Comment::findOrFail($id);
        return view('admin.post.comments.form', compact('model'));
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
            'name' => 'required',
            'body' => 'required',
            'email' => 'required|email|unique:users',
            ]);
        $model = Comment::findOrFail($id);
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
        $model = Comment::findOrFail($id);
        $model->delete();
    }
    public function reply(Request $request , $comment_id)
    {
        if (!Auth::check()){
            $request->session()->flash('login', 'Maaf Anda harus login dulu supaya bisa koment');
            return redirect()->back()->with('danger', 'OPS... sorry you have to register and login first before you can REPLY comment. #cmiw');
        }


    	$request->validate([
            // 'name' => 'required',
            'body' => 'required',
            // 'email' => 'required|email|unique:users',
        ]);

        $comment = Comment::find($comment_id);

        $reply = new Comment();
        $reply->body = $request->body;
        $reply->users_id = Auth::user()->id;

        $comment->comments()->save($reply);

        return redirect()->back()->with('success','Comment Reply Successfully');
    }
    public function tickets(Request $request, $tickets_id)
    {
        if (!Auth::check()){
            $request->session()->flash('login', 'Maaf Anda harus login dulu supaya bisa koment');
            return redirect()->back()->with('danger', 'OPS... sorry you have to register and login first before you can REPLY comment. #cmiw');
        }
        $request->validate([
            // 'name' => 'required',
            'body' => 'required',
            // 'email' => 'required|email|unique:users',
        ]);
        $tickets = Tickets::find($tickets_id);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->users_id = Auth::user()->id;

        $tickets->comments()->save($comment);

        return redirect()->back()->with('success','Comment Added Successfully');

    }

}
