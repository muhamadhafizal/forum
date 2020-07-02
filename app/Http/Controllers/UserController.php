<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Redirect;
class UserController extends Controller
{
    public function store(Request $request){

        $name = $request->input('name');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');
        $state = $request->input('state');

        $userexist = User::where('username',$username)->first();

        if($userexist){
            \Session::flash('flash_message_delete', 'Username / Password / Nickname / Email Already Exist');
			return Redirect::route('registeruser');
        } else {

            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->username = $username;
            $user->password = $password;
            $user->state = $state;
            $user->role = 'user';

            $user->save();
            
            \Session::flash('flash_message', 'successfully added.');
            return Redirect::route('main');
        }

    }
}
