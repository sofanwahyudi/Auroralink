<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Post;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $post = Post::orderBy('updated_at', 'desc')->first();
        $katergori = Category::orderBy('updated_at', 'desc')->first();

        return response()->view('sitemap.index', [
            'post' => $post,
            'kategori' => $katergori,
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
