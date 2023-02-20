<?php

namespace App\Http\Controllers;

use App\Models\Fee;
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

    public function studentTable ()
    {
        $getFee = Fee::get();
        return view('user.registrar.student-table', ['fee' => $getFee]);
    }
}
