<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function loginUser(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username == '' && $password == '') {
            return view('login', ['username' => $username, 'alert' => 'EMPTY_FIELD']);
        }

        if ($password == '') {
            return view('login', ['username' => $username, 'alert' => 'EMPTY_PASS']);
        }

        $user = DB::table('user')
            ->select('*', 'user_type.*')
            ->join('user_type', 'user.type', '=', 'user_type.id')
            ->where('username', $username)
            ->where('password', $password)
            ->first();

        if ($user !== NULL) {

            $dt = Carbon::now();

            $sessionArr = array(
                'id'            => $user->id,
                'student_id'    => $user->student_id,
                'status'        => $user->status,
                'username'      => $user->username,
                'name'          => $user->name,
                'user_type'     => $user->user_type,
                'login_time'    => $dt->toDateTimeString(),
            );

            session($sessionArr);

            // return response()->json($request->session()->all());


            if ($user->user_type == 'REGISTRAR') {
                return redirect('/students');
            } else {
                return redirect('/dashboard');
            }
        } else {
            return view('login', ['username' => $username, 'alert' => 'INCORRECT']);
        }
    }
}
