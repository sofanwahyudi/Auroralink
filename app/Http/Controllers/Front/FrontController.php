<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Jasa;
use App\Model\Portofolio;
use App\Model\Post;
use App\Model\Section;
use App\Model\Team;
use App\Model\Tickets\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
        $about = DB::table('section')->where('id', 1)->first();
        $services = Jasa::all()->take(4);
        $team   = Team::all();
        $portofolio = Portofolio::all();
        $blog = Post::all()->take(3);
        $contact = DB::table('section')->where('id', 11)->first();
        $start = DB::table('section')->whereIn('id', array(2, 4, 5))->get();
// dd($about);
        return view('frontend.welcome', compact('services', 'team', 'about','portofolio','contact','blog','start'));
    }
    public function blog(){
        $blogs = Post::all();
        $categories = Category::all();
        return view('blog.index')->withBlogs($blogs)->withCategories($categories);
    }
    public function post($slug){
        // $blog = DB::table('post')->where('post.slug', $slug)->first();
       // $blog = Post::findOrFail($id);
        $blog = Post::where('id', $slug)->orWhere('slug', $slug)->firstOrFail();
        $cats = Category::all();
        // dd($blog->comments);
        return view('blog.post')->withBlog($blog)->withCats($cats);
    }
    public function search(Request $request)
    {
          $search = $request->get('term');

          $result = Post::where('content', 'LIKE', '%'. $search. '%')->get();

          return response()->json($result);

    }
    public function kategori($slug){
        $cat = Category::where('title', $slug)->firstOrFail();
        return view('blog.index')->withCat($cat);
    }
    public function getCategories()
    {
        $cats = Category::with('post')->get();
        // dd($cats);
        return view('blog.categories')->withCats($cats);
    }
    public function tickets()
    {
        $tic = Tickets::all();

        return view('tickets.page')->withTic($tic);
    }
    public function getTickets($slug)
    {
        $tickets = Tickets::where('id', $slug)->orWhere('slug', $slug)->firstOrFail();
        return view('tickets.detail_tickets')->withTickets($tickets);
    }
}
