<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    //
    public function show() {

        return view('auth.register');
    }

    public function register(Request $request) {

        // input field validation rules
        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',

        ]);

        // handles validation error
        if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        }

        // Store new user
        User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
        ]);

        // show redirect success message and redirect to login page
        // return redirect()->route('register.form')->with('success', 'Registration successful!');
        return redirect()->route('login.form')->with('success', 'Registration successful Please login.!');
    }
}
