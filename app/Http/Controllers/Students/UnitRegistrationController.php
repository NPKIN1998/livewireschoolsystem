<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UnitRegistrationController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $userData = DB::table('registered_students')
            ->join('users', 'users.id', '=', 'registered_students.user_id')
            ->where('users.id', '=', $userId)
            ->first();
        $units = Unit::all();
    }
}
