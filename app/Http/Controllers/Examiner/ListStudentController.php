<?php

namespace App\Http\Controllers\Examiner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ListStudentController extends Controller
{

  public function index()
  {

    $enrolledStudents = DB::table('registered_students')
                ->join('users', 'users.id', '=', 'registered_students.user_id')
                ->join('courses', 'courses.id', '=', 'registered_students.course_id')
                ->get();
        // dd($enrolledStudents);
        return view('examiner.students.index', compact('enrolledStudents'));
  }
}
