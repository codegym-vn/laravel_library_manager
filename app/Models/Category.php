<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function books(){

        return $this->hasMany('App\Models\Book');

    }
}
