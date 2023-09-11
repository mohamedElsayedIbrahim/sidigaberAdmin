<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('welcome');
    }

    public function handel_login(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:100|min:3|exists:users,name',
            'password'=>'required|string|max:30|min:5'
        ]);
        if (Auth::attempt(['name'=>$request->name,'password'=>$request->password])) {
            return redirect()->route('app.board');    
        }

        return back()->with('error',__('error.login'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'password'=>'required|confirmed|string|max:30|min:5'
        ]);

        $user = User::find(Auth::id());

        try {
            $user->update(['password'=>Hash::make($request->password)]);
            return back()->with('message',__('success.submitted'));
        } catch (\Throwable $th) {
            return back()->with('message',$th->getMessage());
        }
    }
}
