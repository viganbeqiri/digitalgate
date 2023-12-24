<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        /**
         * validate request
         */
        $this->validate($request, [
            'first_name'      => 'required',
            'last_name'      => 'required',
            'email'     => 'required|unique:users',
            'password'  => 'required|confirmed'
        ]);

        /**
         * create user
         */
        User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'first_name'      => $request->first_name,
            'last_name'      => $request->last_name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        //redirect
        return redirect('/sign-in')->with('status', 'Registration successful!');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        //get email and password from request
        $credentials = $request->only('email', 'password');

        //attempt to login
        if (Auth::attempt($credentials)) {

            //regenerate session
            $request->session()->regenerate();
            if (Auth::user()->role == 1) {
                //redirect route admin
                return redirect('/admin');
            } else {
                //redirect route dashboard
                return redirect('/');
            }
            //redirect route dashboard
        }

        //if login fails
        return back()->withErrors([
            'message' => 'The provided credentials do not match our records.',
        ]);
    }
}
