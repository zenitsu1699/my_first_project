<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\The_users;

class InscriptionController extends Controller
{
    public function form()
    {
        return view('inscription');
    }

    public function traitement()
    {
        $new_user = The_users::create([
            'email' => request('email'),
            'username' => request('username'),
            'my_password' => bcrypt(request('password')),
        ]);

        return view('traitement', [
            'user_name' => request('username'),
        ]);
    }
}
