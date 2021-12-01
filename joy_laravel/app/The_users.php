<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class The_users extends Model {
    protected $fillable = ['email', 'username', 'my_password'];
}