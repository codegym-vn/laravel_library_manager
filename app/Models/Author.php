<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    public function books () {
        return $this->hasMany('App\Models\Book','id_author');
    }
}
