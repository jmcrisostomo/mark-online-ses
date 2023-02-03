<?php

namespace App\Http\Controllers;

use App\Requirement;
use App\RequirementType;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return $request;
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
}
