<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('landingpage');
    }

    public function login()
    {
        return view('login');
    }

    public function dashboard()
    {
        if (session()->has('login_time')) {
            return view('user.dashboard');
        } else {
            return redirect('/login');
        }
    }

    public function enroll()
    {

        $course = Course::get();

        return view('enrollpage', [
            'course' => $course
        ]);
    }
}
