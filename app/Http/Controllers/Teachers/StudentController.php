<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    public function index()
    {
       
      $users = User::where('role_id', 2)->get();
    //   dd($users);

    //   foreach ($users as $user) {
    //       echo $user->name; // Access user attributes
    //   }

        return view('teacher.students.index' , compact('users'));
    }
}
