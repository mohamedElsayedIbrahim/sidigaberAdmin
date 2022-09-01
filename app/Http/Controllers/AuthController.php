<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('welcome');
    }

    public function handel_login(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:100|min:3|exists:Users,name',
            'password'=>'required|string|max:30|min:5'
        ]);
        Auth::attempt(['name'=>$request->name,'password'=>$request->password]);
        return redirect()->route('app.board');    
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
