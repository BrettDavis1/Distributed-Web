<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ShopController extends Controller
{
    public function index() {

        if(!auth()->check())
            return redirect()->to('/login');

        return view('shop.index');

    }

    public function getReduceByOne($id) {

        $movie = (new Movie)->find($id);
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->reduceByOne($movie, $id);

        session()->put('cart', $cart);

        return redirect()->to('/cart');

    }

    public function getRemoveItem($id) {

        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->removeItem($id);

        session()->put('cart', $cart);

        return redirect()->to('/cart');

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

        return view('shop.checkout', [
            'movies' => $cart->movies,
            'total' => $cart->totalPrice,
        ]);

    }

    public function buy(Request $request) {

        if(!Session::has('cart')) {
            return view('shop.index');
        }

        $id = \Auth::id();

        $oldcart = session()->pull('cart');
        $cart = new Cart($oldcart);

        $transactionid = DB::table('transaction')->insertGetId([
            'UserID' => $id,
            'CCID' => '1',
            'Total_Charge' => $cart->totalPrice
        ]);

        foreach ($cart->movies as $movie)
            DB::table('transactionitem')->insert([
                'TransactionID' => $transactionid,
                'UserID' => $id,
                'MovieID' => $movie['item']['id']

            ]);

        $ccid = DB::table('creditcard')->insertGetId([
            'UserID' => $id,
            'Name' => $request->input('card-holder'),
            'CC_Number' => $request->input('card-number'),
            'Exp_Month' => $request->input('MM'),
            'Exp_Day' => $request->input('YY')
        ]);

        DB::table('creditcarduser')->insert([
            'CCID' => $ccid,
            'UserID' => $id
        ]);

        return view('shop.index')->with('success', 'Purchase is Successful');

    }

    public function history() {

        if(!auth()->check())
            return redirect()->to('/login');

        $id = \Auth::id();
        $transactions = DB::table('transaction')->where('UserID', '=', $id)->get();

        return view('history.index', compact('transactions'));
    }

    public function transaction($transaction) {

        if(!auth()->check())
            return redirect()->to('/login');

        $id = \Auth::id();
        $vid = DB::table('transaction')->where('TransactionID', '=', $transaction)->pluck('UserID')->first();

        if($id != $vid)
            return redirect()->to('/home');

        $mids = DB::table('transactionitem')->where('TransactionID', '=', $transaction)->pluck('MovieID');

        $movies = array();
        $i = 0;
        foreach ($mids as $mid) {
            $movies[$i] = (new Movie)->getHistory($mid);
            $i++;
        }

        return view('history.transaction', compact('movies'));

    }
}
