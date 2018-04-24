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
        $dramas = (new Movie)->getMovie('drama');
        $horrors = (new Movie)->getMovie('horror');
        $scifis = (new Movie)->getMovie('sci-fi');
        return view('movies.index', compact('actions', 'comedies', 'dramas', 'horrors', 'scifis'));

    }

    public function description(Movie $movie) {

        if(!auth()->check())
            return redirect()->to('/login');

        return view('movies.description', compact('movie'));

    }


}
