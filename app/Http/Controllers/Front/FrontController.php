<?php

namespace App\Http\Controllers;

use App\Model\Jasa;
use App\Model\Portofolio;
use App\Model\Post;
use App\Model\Section;
use App\Model\Team;
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
        $blog = Post::all();
        return view('blog.index')->withBlog($blog);
    }
}
