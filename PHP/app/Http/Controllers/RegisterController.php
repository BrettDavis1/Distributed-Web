<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {

        return view('register.index');

    }

    public function store() {
        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|confirmed',
            'address' => 'required',
            'phone' => 'required',
        ]);


        $user = User::create(request(['name', 'username', 'email', 'password', 'address', 'phone']));

        auth()->login($user);

        return redirect()->to('/home');
    }
}
