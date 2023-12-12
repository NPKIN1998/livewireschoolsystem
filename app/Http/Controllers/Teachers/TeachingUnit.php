<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\LectureUnit;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachingUnit extends Controller
{
    public function index()
    {

        $lecturerId = auth()->user()->id; // Get the ID of the authenticated user (assuming it's a lecturer)

        // Retrieve units associated with the lecturer from the LectureUnit pivot table
        $lectureUnits = LectureUnit::where('user_id', $lecturerId)->pluck('unit_id')->toArray();

        // Retrieve units associated with the lecturer from the units table
        $units = Unit::whereIn('id', $lectureUnits)->get();

        return view('teacher.units.index', compact('units'));
    }
}
