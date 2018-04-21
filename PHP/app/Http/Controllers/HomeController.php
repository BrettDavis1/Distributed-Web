<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class HomeController extends Controller
{

    public function index() {

        $covers = Movie::info('image');
        $id = str_replace('[', '', Movie::info('id'));
        $id = str_replace(']', '', $id);
        return view('home.index', compact('covers', 'id'));

    }
}
