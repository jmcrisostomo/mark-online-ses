<?php

namespace App\Http\Controllers;

use App\Mail\StudentApproveMail;
use App\Mail\StudentDeclineMail;
use App\Mail\UserVerificationMail;
use App\Requirement;
use App\RequirementType;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    public function submit(Request $request)
    {

        $course = $request->input('course');
        $lastName = $request->input('last_name');
        $firstName = $request->input('first_name');
        $middleName = $request->input('middle_name');
        $address = $request->input('address');
        $gender = $request->input('gender');
        if ($gender == "Male") {
            $gender = "M";
        } else if ($gender == "Female") {
            $gender = "F";
        }
        $civilStatus = $request->input('civil_status');
        $nationality = $request->input('nationality');
        $contactNumber = $request->input('contact_number');
        $email = $request->input('email');
        $birthDate = $request->input('birth_date');
        $birthPlace = $request->input('birth_place');

        $studentPicture = $request->file('student_picture');
        $studentTor = $request->file('student_tor');
        $studentHon = $request->file('student_hon');
        $studentGmc = $request->file('student_gmc');
        $studentPsa = $request->file('student_psa');

        $studentId = Student::create([
            'course_id' => $course,
            'last_name' => $lastName,
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'address' => $address,
            'gender' => $gender,
            'civil_status' => $civilStatus,
            'nationality' => $nationality,
            'contact_number' => $contactNumber,
            'email' => $email,
            'birth_date' => $birthDate,
            'birth_place' => $birthPlace,
            'modified_by' => "SYSTEM",

            'branch' => '1',
            'year' => '2023',
            'semester' => '1',
        ])->id;

        $student = Student::find($studentId);
        $student->student_code = str_pad($studentId, 8, "0", STR_PAD_LEFT);
        $student->save();

        // create username for student

        $username = $firstName[0] . $middleName[0] . $lastName;
        $username = strtolower($username);

        $this->createUserAccount($studentId, $username);

        if (isset($studentPicture) && $studentPicture != NULL) {
            $this->createRequirement($studentId, $studentPicture, 'studentPicture');
        }
        if (isset($studentTor) && $studentTor != NULL) {
            $this->createRequirement($studentId, $studentTor, 'studentTor');
        }
        if (isset($studentHon) && $studentHon != NULL) {
            $this->createRequirement($studentId, $studentHon, 'studentHon');
        }
        if (isset($studentGmc) && $studentGmc != NULL) {
            $this->createRequirement($studentId, $studentGmc, 'studentGmc');
        }
        if (isset($studentPsa) && $studentPsa != NULL) {
            $this->createRequirement($studentId, $studentPsa, 'studentPsa');
        }

        // {
        //     _token: "Ly2xqBoUuKHvrA0CJ8IE7p1T7Koq5V6qwxMc3q83",
        //     last_name: "Neal",
        //     first_name: "Ori",
        //     middle_name: "Chelsea Keith",
        //     address: "Et quae voluptatum o",
        //     gender: "Est tempore cumque",
        //     civil_status: "Omnis in molestiae l",
        //     nationality: "Corporis aut dolore",
        //     contact_number: "835",
        //     email: "ruseja@mailinator.com",
        //     birth_date: "1978-05-28",
        //     birth_place: "Consequuntur rerum d"
        //     }
        $this->sendRegisterMail($studentId);

        // return $request;
        return redirect('/registration/success');
    }
    public function createUserAccount($id, $username)
    {

        $user = DB::table('user')->select('username')->where('username', $username)->first();

        if ($user == NULL) {
            $student = Student::find($id);

            $createUser = User::create([
                'student_id'    => $id,
                'username'      => $username,
                'password'      => "test1234",
                'name'          => $student->first_name . " " . $student->last_name,
                'status'        => "VERIFIED",
                'type'          => 5 // user type
            ]);
        } else {
            echo 'Username already registered';
        }
    }
    public function createRequirement($id, $file, $type)
    {
        $extension = $file->extension();
        $fileName = $file->hashName();
        $pathCustom = "files/students/$id/";
        $path = $file->storeAs($pathCustom, $fileName);

        $inputs = collect([
            'studentPicture',
            'studentTor',
            'studentHon',
            'studentGmc',
            'studentPsa',
        ]);

        $reqArr = collect(RequirementType::all())->map(function ($type, $i) {
            $reqArr = [$type->requirement_type, $type->id];
            return $reqArr;
        });

        $reqArr = $inputs->combine($reqArr);

        Requirement::create([
            'student_id' => $id,
            'requirement_path' => $pathCustom,
            'requirement_filename' => $fileName,
            'requirement_file_ext' => $extension,
            'requirement_type_id' => $reqArr[$type][1],
        ]);
    }
    public function sendRegisterMail($id)
    {
        $getUserInfo = DB::table('student')
            ->select('*')
            ->join('user', 'user.student_id', '=', 'student.id')
            ->where('student.id', $id)
            ->first();

        if ($getUserInfo) {

            $email = $getUserInfo->email;
            $name = $getUserInfo->name;
            $username = $getUserInfo->username;
            $url_verify = url('/registration/verify/' . $getUserInfo->student_code);

            $mailData = [
                'name'      => $name,
                'email'     => $email,
                'username'     => $username,
                'url_verify'     => $url_verify,
            ];

            Mail::to($email)->send(new UserVerificationMail($mailData));
        }
    }

    public function submitVerify(Request $request)
    {
        $password = $request->input('password');
        $studentCode = $request->input('student_code');

        $studentId = Student::find($studentCode);
        if ($studentId) {
            DB::table('user')
                ->where('student_id', $studentId->id)
                ->update(['password' => $password, 'status' => 'VERIFIED']);

            return redirect('/login')->with('message', 'Password has been updated, you can now login.');
        } else {
            dd('error');
        }
    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::orderByDesc('id')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status_badge', function ($row) {

                    if ($row->status == 'PENDING') {
                        $badge = '<span class="badge bg-warning text-dark">' . $row->status . '</span>';
                    } else if ($row->status == 'APPROVED') {
                        $badge = '<span class="badge bg-success">' . $row->status . '</span>';
                    } else if ($row->status == 'DECLINED') {
                        $badge = '<span class="badge bg-danger">' . $row->status . '</span>';
                    } else {
                        $badge = '<span class="badge bg-light">' . $row->status . '</span>';
                    }

                    return $badge;
                })
                ->addColumn('action', function ($row) {

                    $name = implode(" ", [$row->first_name, $row->last_name]);

                    if ($row->status == 'PENDING') {
                        $actionBtn = '
                        <a class="docs btn btn-primary btn-sm" data-student-id="' . $row->id . '">View Documents</a>
                        <a class="approve btn btn-success btn-sm" data-student-id="' . $row->id . '" data-student-name="' . $name . '">Approve</a>
                        <a class="decline btn btn-danger btn-sm" data-student-id="' . $row->id . '" data-student-name="' . $name . '">Decline</a>';
                    } else {
                        $actionBtn = '
                        <a class="docs btn btn-primary btn-sm" data-student-id="' . $row->id . '">View Documents</a>';
                    }


                    return $actionBtn;
                })
                ->rawColumns(['action', 'status_badge'])
                ->make(true);
        }
    }


    public function approveStudent(Request $request)
    {
        $studentId = $request->input('student_id');
        $studentId = Student::find($studentId);

        if ($studentId) {
            DB::table('student')
                ->where('id', $studentId->id)
                ->update(['status' => 'APPROVED', 'student_requirement_status' => 'COMPLETED']);

            $name = implode(' ', [$studentId->first_name, $studentId->last_name]);
            $email = $studentId->email;

            $mailData = [
                'name'      => $name,
                'email'     => $email,
            ];

            Mail::to($email)->send(new StudentApproveMail($mailData));

            return redirect('/students')->with('message', 'Student Approved.');
        } else {
            return redirect('/students')->with('message', 'Cannot find Student.');
        }
    }

    public function declineStudent(Request $request)
    {
        $studentId = $request->input('student_id');
        $declineReason = $request->input('decline_reason');
        $studentId = Student::find($studentId);

        if ($studentId) {
            DB::table('student')
                ->where('id', $studentId->id)
                ->update(['status' => 'DECLINED', 'decline_reason' => $declineReason]);

            $name = implode(' ', [$studentId->first_name, $studentId->last_name]);
            $email = $studentId->email;

            $mailData = [
                'name'      => $name,
                'email'     => $email,
                'reason'    => $declineReason
            ];

            Mail::to($email)->send(new StudentDeclineMail($mailData));

            return redirect('/students')->with('message', 'Student Declined.');
        } else {
            return redirect('/students')->with('message', 'Cannot find Student.');
        }
    }

    // public function html_email() {
    //     $data = array('name'=>"Virat Gandhi");
    //     Mail::send('mail', $data, function($message) {
    //        $message->to('abc@gmail.com', 'Tutorials Point')->subject
    //           ('Laravel HTML Testing Mail');
    //        $message->from('xyz@gmail.com','Virat Gandhi');
    //     });
    //     echo "HTML Email Sent. Check your inbox.";
    //  }
}
