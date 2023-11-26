<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;

class TranscriptController extends Controller
{

    public function index()
    {
        return view('student.transcript.index');
    }

}