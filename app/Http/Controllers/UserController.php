<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    // show register/create form
    public function create() {
        return view('users.register');
    }

    // store new user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required', 'min:3',
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // has password
        $formFields['password'] = bcrypt($formFields['password']);

        // create user
        $user = User::create($formFields);

        // login
        auth()->login($user);

        // redirect
        return redirect('/')->with('message', 'User created and logged in successfully!');

    }

    // logout user
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
        
    }

    // show login form
    public function login() {
        return view('users.login');
    }

    // authenticate user
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required|min:6'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            
            return redirect('/')->with('message', 'You are now logged in!');
        } 

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');

    }

}
