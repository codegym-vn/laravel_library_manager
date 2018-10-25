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

    public function student ()
    {
        return $this->belongsTo('App\Models\Student', 'id_student');
    }

    public function billDetail ()
    {
        return $this->hasOne('App\Models\BillDetail');
    }
}
