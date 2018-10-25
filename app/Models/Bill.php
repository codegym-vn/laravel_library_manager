<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    public function book ()
    {
        return $this->belongsTo('App\Models\Book', 'id_book');
    }
}
