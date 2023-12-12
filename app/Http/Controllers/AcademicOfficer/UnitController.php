<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\School;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
  public function index()
  {
    $units = Unit::all();
    return view('admin.units.index', compact('units'));
  }
  public function create()
  {
    $schools = School::all();
    return view('admin.units.create', compact('schools'));
  }
  /**
   * Display a listing of the resource.
   */
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'unit_number' => 'required',
      'unit_name' => 'required',
      'school_id' => 'required',
      'year' => 'required',
      'semester' => 'required'
    ]);
    // $unit =
    Unit::create([
      'unit_number' => $request->input('unit_number'),
      'unit_name' => $request->input('unit_name'),
      'school_id' => $request->input('school_id'),
      'year' => $request->input('year'),
      'semester' => $request->input('semester'),
    ]);

    return redirect()->route('admin.units')->with('success', 'Unit created successfully!!!');
  }


  /**
   * Display the specified resource.
   */
  public function show(Unit $unit)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Unit $unit)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Unit $unit)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Unit $unit)
  {
    //
  }
}
