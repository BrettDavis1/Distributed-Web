<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function scopeInfo($query, $info) {

        return $query->pluck($info);

    }

    public function scopeMovie($query, $id) {

        return $query->find($id);

    }

    public function user() {

        $this->belongsTo(User::class);

    }
}
