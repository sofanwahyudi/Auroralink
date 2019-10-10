<?php

namespace App\Http\Controllers;

use App\Model\Jasa;
use App\Model\Portofolio;
use App\Model\Section;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
        $about = DB::table('section')->where('id', 1)->first();
        $services = Jasa::all();
        $team   = Team::all();
        $portofolio = Portofolio::all();
        $contact = DB::table('section')->where('id', 11)->first();

        return view('frontend.welcome', compact('services', 'team', 'about','portofolio','contact'));
    }
}
