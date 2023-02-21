<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    public function studentTable()
    {
        $getFee = Fee::get();

        if (Route::is('student-table')) {
            $header = 'Pre-Enrolled Students';
            $dataTable = route('students.list');
        } elseif (Route::is('student-table-approved')) {
            $header = 'Approved Students';
            $dataTable = route('students.list.approved');
        } elseif (Route::is('student-table-declined')) {
            $header = 'Declined Students';
            $dataTable = route('students.list.declined');
        }
        return view('user.registrar.student-table', ['fee' => $getFee, 'header' => $header, 'dataTable' => $dataTable]);
    }
    public function test(Request $request)
    {
        return $request;
    }
}
