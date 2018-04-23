<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
    public function index() {

        if(!auth()->check())
            return redirect()->to('/login');

        $actions = (new Movie)->getMovie('action');
        $comedies = (new Movie)->getMovie('comedy');
        return view('movies.index', compact('actions', 'comedies'));

    }

    public function description(Movie $movie) {

        if(!auth()->check())
            return redirect()->to('/login');

        return view('movies.description', compact('movie'));

    }


}
