<?php

namespace App\Http\Controllers\Students;

use App\Models\Unit;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return $units;
    }
}
