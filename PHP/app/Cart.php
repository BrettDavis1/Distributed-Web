<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 4/22/18
 * Time: 12:35 AM
 */

namespace App;


class Cart
{

    public $movies = null, $totalQty = 0, $totalPrice = 0;

    public function __construct($oldcart)
    {
        if ($oldcart) {
            $this->movies = $oldcart->movies;
            $this->totalQty = $oldcart->totalQty;
            $this->totalPrice = $oldcart->totalPrice;
        }
    }

    public function add($movie, $id) {
        $storedItem = [
            'qty' => 0,
            'price' => $movie->Price,
            'item' => $movie,
            ];

        if($this->movies) {
            if(array_key_exists($id, $this->movies)) {
                $storedItem = $this->movies[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $movie->Price * $storedItem['qty'];
        $this->movies[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $movie->Price;
    }

    public function reduceByOne($movie, $id) {

        $this->movies[$id]['qty']--;
        $this->movies[$id]['price'] -= $movie->Price;
        $this->totalQty--;
        $this->totalPrice -= $movie->Price;

        if($this->movies[$id]['qty'] <= 0)
            unset($this->movies[$id]);

    }

    public function removeItem($id) {

        $this->totalQty -= $this->movies[$id]['qty'];
        $this->totalPrice -= $this->movies[$id]['price'];
        unset($this->movies[$id]);
    }
}