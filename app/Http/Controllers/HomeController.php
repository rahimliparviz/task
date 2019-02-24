<?php

namespace App\Http\Controllers;


use App\Models\Gallery\Image;
use App\Models\Gallery\Video;
use App\Models\Home\Home;
use App\Models\Home\HomeTranslation;
use App\Models\Navigation\Element;
use App\Models\Words\Word;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
}
