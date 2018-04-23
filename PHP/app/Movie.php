<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    public function getMovie($genre) {

       return $this->where('genre', $genre)->where('id', '!=', '4')->get();

    }

    public function getMovies() {

        return $this->where('id', '!=', '4')->get();
    }

    public function scopeMovie($query, $id) {

        return $query->find($id);

    }

    public function scopeInfo($query, $info) {

        return $query->pluck($info);
    }

    public function user() {

        $this->belongsTo(User::class);

    }
}
