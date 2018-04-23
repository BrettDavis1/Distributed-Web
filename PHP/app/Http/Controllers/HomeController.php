<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class HomeController extends Controller
{

    public function index() {

        if(!auth()->check())
            return redirect()->to('/login');

        $movies = (new Movie)->getMovies();
        $bp = (new Movie)->movie('4');
        return view('home.index', compact('movies', 'bp'));

    }
}
