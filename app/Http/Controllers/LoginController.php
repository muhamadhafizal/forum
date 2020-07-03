<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use Redirect;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function register(){
        return view('register');
    }

    public function login(Request $request){

        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username',$username)->where('password',$password)->first();

        if($user){

            $request->session()->put('username', $username);
			$request->session()->put('password', $password);
            $request->session()->put('role', $user->role);
            $request->session()->put('name', $user->name);
            
            if($user->role == 'admin'){
                return Redirect::route('indexforum', compact('user'));
            } else {
                return Redirect::route('indexforum', compact('user'));
            }
            
        } else {
            \Session::flash('flash_message_delete', 'Username / Password / Nickname / Email Invalid');
		    return Redirect::route('main');
        }

    }

    public function logout(){
        Session::flush();
		return redirect('/');
    }

    public function logingoogle(){
        echo "hello";
    }

    public function redirectToProvider() {
		return Socialite::driver('google')->redirect();
	}

	public function handleProviderCallback(Request $request) {
		$usermail = Socialite::driver('google')->stateless()->user();

        //echo $usermail->email;
        $user = User::where('email',$usermail->email)->first();
   
        if($user){

            $request->session()->put('username', $user->username);
			$request->session()->put('password', $user->password);
            $request->session()->put('role', $user->role);
            $request->session()->put('name', $user->name);
            
            if($user->role == 'admin'){
                return Redirect::route('indexforum', compact('user'));
            } else {
                return Redirect::route('indexforum', compact('user'));
            }
            
        } else {
            \Session::flash('flash_message_delete', 'Username / Password / Nickname / Email Invalid');
		    return Redirect::route('main');
        }
	
	}
}
