<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authManagerController extends Controller
{
    function login() {
        return view("login");
    }


    function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only("email","password");
        if(Auth::atempt($credentials)) {
            return redirect()->intended(route("home"));
        }
        return redirect(route("login"))->with("error","Login details are not valid");
    }


    function register() {
        return view("login");
    }
}
