<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function check()
    {
        if (!Auth::check()) return redirect()->to('/login');

        return redirect('/dashboard');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function attempt(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'  => 'required',
            'password'  => 'required',
        ]);

        if ($validator->fails())
            return redirect('/login')
                ->withErrors($validator, 'login')
                ->withInput();

        $validated = $validator->validated();;

        if (!Auth::attempt($validated))
            return redirect('/login')
                ->withErrors('Login gagal, silakan coba lagi.')
                ->withInput();

        $request->session()->regenerate();
        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
