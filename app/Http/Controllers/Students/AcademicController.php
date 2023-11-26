<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AcademicController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $user = DB::table('registered_students')
            ->join('users', 'users.id', '=', 'registered_students.user_id')
            ->join('courses', 'courses.id', '=', 'registered_students.course_id')
            ->where('users.id', '=', $userId)
            ->get();
        dd($user);
    }
}
