<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register/Create form
    public function create()
    {
        return view('users.register');
    }


    //save new user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create new user
        $user = User::create($formFields);

        //log user in
        auth()->login($user);

        //redirect to home page
        return redirect('/')->with('mssg', 'User created successfully');
    }

    //log user out
    public function destroy(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('mssg', 'User logged out successfully');
    }

    //show login form
    public function login()
    {
        return view('users.login');
    }

    //authenticate user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //attempt to log user in
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('mssg', 'User logged in successfully');
        }

        return back()->withErrors([
            'email' => 'nvalid credentials .',
        ])->onlyInput('email');
    }
}
