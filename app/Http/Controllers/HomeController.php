<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function enroll()
    {

        $course = Course::get();

        return view('enrollpage', [
            'course' => $course
        ]);
    }

    public function submitSuccess()
    {
        return view('success_enrollpage');
    }

    public function registrationVerify($studentCode)
    {
        $verifyStudentCode = DB::table('student as s')
            ->select('s.id', 'u.status', 'u.username', 'u.name', 's.student_code')
            ->join('user as u', 'u.student_id', '=', 's.id')
            ->where('s.student_code', $studentCode)
            ->first();
        if ($verifyStudentCode->status == 'UNVERIFIED') {
            return view('userverify', ['studentCode' => $verifyStudentCode->student_code]);
        } else {
            // dd('User is already verified');
            return redirect('/login')->with('already_verified', 'Student Code is already verified.');
        }
    }
}
