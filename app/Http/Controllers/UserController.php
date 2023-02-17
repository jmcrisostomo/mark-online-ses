<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function dashboard()
    {
        if (session()->has('login_time')) {
            return view('user.dashboard');
        } else {
            return redirect('/login');
        }
    }
}
