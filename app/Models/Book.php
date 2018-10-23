<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    public function category() {
        return $this->belongsTo('App\Models\Category', 'id_category');
    }

    public function author() {
        return $this->belongsTo('App\Models\Author', 'id_author');
    }
}
