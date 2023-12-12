<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\UnitMark;

use App\Models\User;
use Illuminate\Http\Request;

class UnitMarkController extends Controller
{

    public function index($studentId)
    {
        
        // Retrieve unit registrations for the given unit
        $student = User::findOrFail($studentId); // Assuming User represents students

        return view('teacher.students.assign_marks', compact('student'));
        // return view('student.transcript.index', compact('unitRegistrations'));
    }
    
    public function store(Request $request, $studentId)
    {
        $student = User::findOrFail($studentId); // Fetch the student
    
        // Logic to save the mark for the student
        $mark = $request->input('marks');
        // Save the mark using your preferred method, for example, updating a column in the user table
        $stu = UnitMark::create([
            'unit_registration_id' => $student->id, 
            'marks' => $mark
        ]);
        // dd($stu);
        return redirect()->route('teacher.students')->with('success', 'Mark assigned successfully');
    }
    
}
