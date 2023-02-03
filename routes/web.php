<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Requirement;
use App\RequirementType;
use Facade\FlareClient\Http\Response;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/enroll', [HomeController::class, 'enroll']);
Route::get('/login', [HomeController::class, 'login']);


Route::post('/submit', [StudentController::class, 'submit'])->name('submit');

Route::post('login/user', [LoginController::class, 'loginUser'])->name('login-user');


Route::get('/dashboard', [HomeController::class, 'dashboard']);


Route::get('/test', [StudentController::class, 'createUserAccount']);
Route::get('/testEloquent', function () {
    $req = DB::table('requirement')
        ->select('*')
        ->join('requirement_type', 'requirement_type.id', '=', "requirement.requirement_type_id")
        ->get();


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

    return response()->json($req);
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
