<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\LectureUnit;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class LectureUnitController extends Controller
{
  public function index()
  {
    $roleId = 3; // Replace this with the actual role ID you want to query
    $users = User::where('role_id', $roleId)->get();

    return view('admin.lectures.index', compact('users'));
  }



  public function lecturesunit()
  {
    $teachers = User::where('role_id', 3)->get(); // Fetch teachers by role ID
    $units = Unit::all(); // Fetch all units

  
    return view('admin.lectures.assign-unit', compact('teachers', 'units'));
  }
  public function assignUnitToLecturer(Request $request)
  {
    // Validate the role ID and unit ID
    // dd($request->all());
    $request->validate([
      'user_id' => 'required',
      'unit_id' => 'required',
    ]);

    $enroll = LectureUnit::create([
      'unit_id' => $request->input('unit_id'),
      'user_id' => $request->input('user_id'),
  ]);
  // dd($enroll);

  return redirect()->route('admin.lecturers');

    // try {
    //   // Find a user with the specific role (e.g., teacher)
    //   $user = User::where('role_id', $roleId)->firstOrFail();
    //   $unit = Unit::findOrFail($unitId);

    //   // Assign unit to the user
    //   $user->units()->syncWithoutDetaching([$unit->id]);

    //   return response()->json(['message' => 'Unit assigned to user with role successfully']);
    // } catch (\Exception $e) {
    //   return response()->json(['error' => 'Failed to assign unit to user with role'], 500);
    // }
  }
}
