<?php

namespace App\Http\Controllers;

use App\Photo;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::with('rates')->get()->sortByDesc(function ($photo, $key) {
            return $photo->getRating();
        });

        return view('home', ['photos' => $photos]);
    }
}
