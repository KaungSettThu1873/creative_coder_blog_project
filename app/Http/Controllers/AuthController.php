<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated =   $this->checkData($request->all());
        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ];
        $user =  User::Create($data);
        auth()->login($user);
        return redirect('/')->with('success', 'Welcome to our study website , ' . $user->name);
    }

    public function logout()
    {
        Auth()->logout();
        return redirect('/')->with('success', 'GoodBye to our study website');
    }

    public function loginIndex()
    {
        return view('auth.login');
    }

    public function login()
    {

        $validated =   request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (Auth::attempt($validated)) {
            return redirect('/')->with('success', 'Welcome back to our study website!');
        }


        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    private function checkData($request)
    {
        return  Validator::make($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
    }
}
