<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {

        return view('register.index');

    }

    public function store() {
        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $user = User::create(request(['name', 'username', 'email', 'password', 'address', 'phone']));

        auth()->login($user);

        return redirect()->to('/home');
    }
}
