<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Portofolio;
use App\Model\Post;
use App\Model\Section;
use App\Model\Team;
use App\Model\Jasa;
use App\Model\Tickets\Tickets;
use Illuminate\Http\Request;
use App\Model\Galery;

class SitemapController extends Controller
{
    public function index()
    {
        $jasa = Jasa::all();
        $blog = Post::orderBy('updated_at', 'desc')->first();
        $tickets = Tickets::orderBy('updated_at', 'desc')->first();
        $galeri = Galery::all();
        // $contact = DB::table('section')->where('id', 11)->first();
        // $start = DB::table('section')->whereIn('id', array(2, 4, 5))->get();
//dd($jasa);
        return response()->view('sitemap.index', [
            'jasa' => $jasa,
            'tickets' => $tickets,
            'blog' => $blog,
            'galeri' => $galeri,

        ])->header('Content-Type', 'text/xml');
    }
    public function posts()
    {
        $posts = Post::all();
        return response()->view('sitemap.blog', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }
}
