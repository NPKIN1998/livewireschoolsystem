<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;

class TranscriptController extends Controller
{

    public function index()
    {
        return view('student.transcript.index');
    }
}
