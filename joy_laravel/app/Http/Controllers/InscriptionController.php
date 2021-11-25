<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function form()
    {
        return view('inscription');
    }

    public function traitement()
    {
        return view('traitement');
    }
}
