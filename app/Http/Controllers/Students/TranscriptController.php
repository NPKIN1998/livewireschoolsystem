<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\UnitMark;
use App\Models\UnitRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TranscriptController extends Controller
{

    public function index()
    {
        
         $studentId = Auth::id();

         // Retrieve marks for the authenticated user along with associated unit information
         $marks = UnitMark::whereHas('unitRegistration', function ($query) use ($studentId) {
             $query->where('user_id', $studentId);
         })->with('unitRegistration.unit')->get();
        // dd($marks);
        // return $marks;
        return view('student.transcript.index', compact('marks'));
    }
}
