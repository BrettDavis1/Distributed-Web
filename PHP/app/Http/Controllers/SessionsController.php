<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function index() {

        return view('sessions.index');

    }

    public function store() {

        if(auth()->attempt(request(['username', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }

        return redirect()->to('/home');
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/');
    }
}
