<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bills_detail';

    public function bill ()
    {
        return $this->belongsTo('App\Models\Bill', 'id_bill');
    }

    public function books()
    {
        return $this->belongsTo('App\Models\Book', 'id_book');
    }
}
