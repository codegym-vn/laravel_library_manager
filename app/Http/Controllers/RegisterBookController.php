<?php

namespace App\Http\Controllers;

use App\Models\RegisterBook;
use Illuminate\Http\Request;

class RegisterBookController extends Controller
{
    public function list(){
        $registers = RegisterBook::all();
        return view('bills.register', compact('registers'));
    }

}
