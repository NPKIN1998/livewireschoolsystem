<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all(); 
        return view('schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schools.create');
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
