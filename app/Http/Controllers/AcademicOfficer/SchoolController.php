<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolRequest;
use App\Models\School;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all(); 
        return view('admin.schools.index', compact('schools'));
    }
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.schools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolRequest $request)
    {
        // creating a new school using the request data from the from ulitizing the StoreSchoolRequest
        // dd($request->all());
        $schools = School::create($request->validated());
        // dd($schools);
        return redirect()->route('schools')->with('success', 'School is created successfully!!!');
    }
}
