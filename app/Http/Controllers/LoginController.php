<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function register(){
        return view('register');
    }

    public function logout(){
        return view('welcome');
    }
}
