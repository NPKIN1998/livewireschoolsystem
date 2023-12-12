<?php

namespace App\Http\Controllers\Examiner;

use App\Http\Controllers\Controller;
use App\Models\User;


class TranscriptController extends Controller
{

  public function index()
  {

    //  $studentId = User::where('role' == 2)->get('id');

    // Retrieve marks for the authenticated user along with associated unit information
    $marks = User::where('role_id', 2) // Assuming role_id 2 represents students
      ->with(['unitRegistrations.unitMarks'])
      ->get();
    // dd($marks);
    // return $marks;
    return view('examiner.transcript.index', compact('marks'));
  }
}
