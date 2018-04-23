<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Cart;
use Illuminate\Http\Request;
use Session;

class ShopController extends Controller
{
    public function index() {

        if(!auth()->check())
            return redirect()->to('/login');

        return view('shop.index');

    }

    public function store(Request $request) {

        $movie = (new Movie)->find($request->input('id'));
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->add($movie, $movie->id);

        $request->session()->put('cart', $cart);

        return redirect()->to('/movies');
    }

    public function getCart() {

        if (!auth()->check())
            return redirect()->to('/login');

        elseif (!Session::has('cart'))
            return view('shop.index');

        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);

        return view('shop.index', [
            'movies' => $cart->movies,
            'totalPrice' => $cart->totalPrice,
            ]);
    }

    public function getCheckout() {

        if(!Session::has('cart')) {
            return view('shop.index');
        }

        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        $total = $cart->totalPrice;

        return view('shop.checkout', compact('total'));

    }
}
