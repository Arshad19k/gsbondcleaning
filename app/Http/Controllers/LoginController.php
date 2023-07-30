<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * Auth login
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {

        // return $request;
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1, 'deleted' => 0],false)) {
            $request->session()->regenerate();
 
            // return redirect()->intended('admindashboard');
            Session::flash('success','Logged In Successfully');

            return Redirect('dashboard');
        } else {

            Session::flash('error','The provided credentials do not match..!');

            return Redirect::back()->withErrors($credentials);;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
