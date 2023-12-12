<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\LectureUnit;
use App\Models\UnitRegistration;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
  public function index()
  {
      $teacherId = auth()->user()->id; // Get the ID of the authenticated teacher (assuming it's a lecturer)

      // Retrieve units taught by the teacher
      $taughtUnits = LectureUnit::where('user_id', $teacherId)->pluck('unit_id')->toArray();
  
      // Retrieve students who have registered for the units taught by the teacher
      $studentIds = UnitRegistration::whereIn('unit_id', $taughtUnits)
                      ->pluck('user_id') // Assuming user_id is the foreign key to users table in UnitRegistration
                      ->toArray();
  
      $users = User::where('role_id', 2) // Assuming role_id 3 represents students
                      ->whereIn('id', $studentIds)
                      ->get();

    return view('teacher.students.index' , compact('users'));
  }
}
