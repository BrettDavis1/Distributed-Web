<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
    public function index() {

        $covers = Movie::info('image');
        $id = str_replace('[', '', Movie::info('id'));
        $id = str_replace(']', '', $id);
        return view('movies.index', compact('covers', 'id'));

    }

    public function description(Movie $movie) {

        return view('movies.description', compact('movie'));

    }
}
