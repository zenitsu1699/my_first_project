<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JamController extends Controller
{
    public function form()
    {
        return view('crack_me');
    }

    public function traitement()
    {
        return view('animation');
    }
}
