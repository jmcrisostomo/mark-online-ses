<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Session;
use App\Mail\UserVerificationMail;
use App\Models\Requirement;
use App\Models\RequirementType;
use App\Models\Student;
use Facade\FlareClient\Http\Response;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/logout', function () {
    session()->flush();
    return redirect('/login')->with('logged_out', 'You have been logged out.');
})->name('logout');
Route::post('/login/user', [LoginController::class, 'loginUser'])->name('login-user');

Route::get('/registration', [HomeController::class, 'enroll']);
Route::post('/registration/submit', [StudentController::class, 'submit'])->name('submit');
Route::get('/registration/success', [HomeController::class, 'submitSuccess']);
Route::get('/registration/verify/{student_code}', [HomeController::class, 'registrationVerify']);
Route::post('/registration/verify/submit', [StudentController::class, 'submitVerify'])->name('submit_verify');

Route::group(['middleware' => ['web']], function () {

    // Default Route
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // Registrar Routes
    Route::get('/students', [UserController::class, 'studentTable'])->name('student-table');
    Route::get('/students/approved', [UserController::class, 'studentTable'])->name('student-table-approved');
    Route::get('/students/declined', [UserController::class, 'studentTable'])->name('student-table-declined');
    Route::get('/data/student', [StudentController::class, 'getStudents'])->name('students.list');
    Route::get('/data/student/approved', [StudentController::class, 'getApprovedStudents'])->name('students.list.approved');
    Route::get('/data/student/declined', [StudentController::class, 'getDeclinedStudents'])->name('students.list.declined');

    Route::get('/data/student/requirement/{student_id}', function ($studentId) {
        $getRequirements = DB::table('requirement')
            ->select('*')
            ->join('requirement_type', 'requirement_type.id', '=', 'requirement.requirement_type_id')
            ->join('student', 'student.id', '=', 'requirement.student_id')
            ->where('student_id', $studentId)
            ->get();

        $getRequirements = collect($getRequirements)->map(function ($arr) {
            return $arr = [
                'requirement_type' => $arr->requirement_type,
                'file' => asset($arr->requirement_path . $arr->requirement_filename . '?t=' . time()),
                'created_at' => $arr->created_at,
                'updated_at' => $arr->updated_at,
                'modified_by' => $arr->modified_by,
            ];
        });

        return response()->json($getRequirements);
    });
    Route::post('/students/submit/approve', [StudentController::class, 'approveStudent'])->name('approve-student');
    Route::post('/students/submit/decline', [StudentController::class, 'declineStudent'])->name('decline-student');

    // Student Routes
    Route::get('/info', [UserController::class, 'studentInfo'])->name('student-info');
    Route::get('/info/transaction', [TransactionController::class, 'getUnpaidTransaction'])->name('student-info-transaction');
});





















// TESTING PURPOSES

Route::get('/test', [StudentController::class, 'createUserAccount']);
Route::get('/testEloquent', function () {
    // $req = DB::table('requirement')
    //     ->select('*')
    //     ->join('requirement_type', 'requirement_type.id', '=', "requirement.requirement_type_id")
    //     ->get();


    // $inputs = collect([
    //     'studentPicture',
    //     'studentTor',
    //     'studentHon',
    //     'studentGmc',
    //     'studentPsa',
    // ]);

    // $reqArr = collect(RequirementType::all())->map(function ($type, $i) {
    //     $reqArr = [$type->requirement_type, $type->id];
    //     return $reqArr;
    // });

    // $reqArr = $inputs->combine($reqArr);

    // foreach ($inputs as $value) {
    //     echo $value;
    // }

    $studentId = Student::find('00000017');

    $getUserInfo = DB::table('student')
        ->select('*')
        ->join('user', 'user.student_id', '=', 'student.id')
        ->where('student.id', 17)
        ->first();

    // if ($getUserInfo) {

    //     $email = $getUserInfo->email;
    //     $email = 'crisjohnmatthew13@gmail.com';
    //     $name = $getUserInfo->name;

    //     Mail::to($email)->send('hello');

    //     Mail::send('smtp', ['data'], function ($message) {
    //         $message->to('crisjohnmatthew13@gmail.com', 'Mattheus')->subject('USER ACCOUNT - ONLINE STUDENT ENROLLMENT SYSTEM');
    //         $message->from('jm.crisostomo.e@gmail.com', 'JM Crisostomo');
    //     });
    // }

    return response()->json($studentId);
});

Route::get('test/mail', function () {
    $mailData = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp.'
    ];

    Mail::to('crisjohnmatthew13@gmail.com')->send(new UserVerificationMail($mailData));

    dd("Email is sent successfully.");
});

Route::get('/testImagestorage', function () {
    $contents = Storage::get('files/students/14/mId3CgUVfx9kgX1F5t7QsBHahQcueDWcceJ9x387.png');
    $type = Storage::mimeType('files/students/14/mId3CgUVfx9kgX1F5t7QsBHahQcueDWcceJ9x387.png');
    return response($contents)->header('Content-Type', $type);
});

// Route::get('storage/{filename}', function ($filename)
// {
//     $path = storage_path('public/' . $filename);

//     if (!File::exists($path)) {
//         abort(404);
//     }

//     $file = File::get($path);
//     $type = File::mimeType($path);

//     $response = Response::make($file, 200);
//     $response->header("Content-Type", $type);

//     return $response;
// });
