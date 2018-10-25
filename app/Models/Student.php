<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    public function bills () {
        return $this->hasMany('App\Models\Bill');
    }
}
