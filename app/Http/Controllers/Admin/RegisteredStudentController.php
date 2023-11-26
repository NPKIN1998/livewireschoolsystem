<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Carbon\Carbon;
use App\Models\RegisteredStudent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisteredStudentController extends Controller
{
    public function index()
    {
       
      $users = User::where('role_id', 2)->get();
      $courses = Course::all();
    //   dd($users);

    //   foreach ($users as $user) {
    //       echo $user->name; // Access user attributes
    //   }

        return view('admin.students.enroll' , compact(['users', 'courses']));
    }

    public function enroll(Request $request)
    {
        // $user = User::find();
        // $course = Course::find();
        // 'semester',
        // 'year_enrollment',
        // 'kcse_score'
        $request->validate([
            'user_id' => 'required',
            'semester' => 'required',
            'year_enrollment' => 'required',
            'kcse_score' => 'required',
            'course_id' => 'required',
          ]);

        $enroll = RegisteredStudent::create([
            'course_id' => $request->input('course_id'),
            'user_id' => $request->input('user_id'),
            'semester' => $request->input('semester'),
            'year_enrollment' => Carbon::createFromFormat('Y-m-d', $request->input('year_enrollment')),
            'kcse_score' => $request->input('kcse_score'),
        ]);

        
    //    dd($enroll);

       return true;
    
    }

    public function liststudent()
    {
        $enrolledStudents = DB::table('registered_students')
                ->join('users', 'users.id', '=', 'registered_students.user_id')
                ->join('courses', 'courses.id', '=', 'registered_students.course_id')
                ->get();
        // dd($enrolledStudents);
        return view('admin.students.index', compact('enrolledStudents'));
        
    }
}
