<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        //redirect
        return redirect('/login')->with('status', 'Register Berhasil!');
    }
}
