<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bills_detail';

    public function bill ()
    {
        return $this->hasOne('App\Models\Bill', 'id_bill');
    }
}
