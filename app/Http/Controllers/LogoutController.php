<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __construct ()
    {
        $this->middleware('auth', ['except'=>'getLogout'], 'timeout');
    }

    public function getLogout() {
        Auth::logout();
        return redirect('login');
    }
}
