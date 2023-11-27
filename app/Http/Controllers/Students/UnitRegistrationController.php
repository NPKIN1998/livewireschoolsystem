<?php

namespace App\Http\Controllers\Students;

use App\Models\Unit;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\UnitRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UnitRegistrationController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $units = DB::table('units')
            ->join('registered_students', function ($join) use ($userId) {
                $join->on('units.semester', '=', 'registered_students.semester')
                    ->on('units.year', '=', 'registered_students.year_student');
            })
            ->join('users', 'users.id', '=', 'registered_students.user_id')
            ->where('users.id', '=', $userId)
            ->select('units.*')
            ->get();
        // dd($units);
        return view('student.lessons.unit-registration', compact('units'));
        // return $units;
    }

    public function store(Request $request)
    {
        $userId = Auth::id();

        // Check if the user already has a registration
        $existingRegistration = UnitRegistration::where('user_id', $userId)->first();

        if ($existingRegistration) {
            // Handle the case when the user already has a registration
            // For example, you can display an error message or perform other actions
            // Session::flash('error', 'You already have a registration.');
            return redirect()->back()->with('error', 'You already have already registered the units.');
            // dd('You already have a registration.');
        } else {
            $unit = DB::table('units')
                ->join('registered_students', function ($join) use ($userId) {
                    $join->on('units.semester', '=', 'registered_students.semester')
                        ->on('units.year', '=', 'registered_students.year_student');
                })
                ->join('users', 'users.id', '=', 'registered_students.user_id')
                ->where('users.id', '=', $userId)
                ->select('units.*')
                ->first();

            $unitIds = $request->input('unit_ids');
            $status = 'register';

            foreach ($unitIds as $unitId) {
                $reg =  UnitRegistration::create(['unit_id' => $unitId, 'status' => $status, 'user_id' => $userId]);
                Session::flash('success', 'Registration successful!');

                dd($reg);
            }
        }
        // $userId = Auth::id();

        // $unit = DB::table('units')
        //     ->join('registered_students', function ($join) use ($userId) {
        //         $join->on('units.semester', '=', 'registered_students.semester')
        //             ->on('units.year', '=', 'registered_students.year_student');
        //     })
        //     ->join('users', 'users.id', '=', 'registered_students.user_id')
        //     ->where('users.id', '=', $userId)
        //     ->select('units.*')
        //     ->first();

        // $unit = $request->input('unit_ids');
        // $status = 'register' || 'deregister';
        // foreach ($unit as $unit) {
        //     $reg =  UnitRegistration::create(['unit_id' => $unit, 'status' => $status, 'user_id' => $userId]);
        //     // dd($reg);
        // }

        return redirect()->back()->with('success', 'Units registered successfully!');

        // $request->validate([
        //     'status' => 'required|array|in:Register,Deregister'
        // ]);

        // // Process the validated form data
        // foreach ($request['status'] as $unitId => $action) {
        //     $unit = Unit::find($unitId);

        //     if ($action === 'Register') {
        //         // Register the unit for the student
        //     } elseif ($action === 'Deregister') {
        //         // Deregister the unit for the student
        //     }
        // }
        // foreach ($units as $unit) {
        //     $reg = UnitRegistration::create([
        //         'status' => $request->input('status'),
        //         'user_id' => $userId,
        //         'unit_id' => $units->first()->id,
        //     ]);

        //     dd($reg);
        // }

    }
}
