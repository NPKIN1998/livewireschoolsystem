<?php

namespace App\Http\Controllers\AcademicOfficer;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcademicOfficer\StoreCourseRequest;
use App\Models\School;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // listing of all courses in the meru university database
        $courses = Course::all();
        // routing or moving to the courses index page
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // routing or moving to the creating of course page with schools being linked with the course
        $schools = School::all();
        return view('admin.courses.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->validated());
        // Page redirect to courses index page
        return redirect()->route('admin.courses')->with('success', 'Course is created successfully!!!');
    }  
}