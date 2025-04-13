<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'username'=>'required|unique:users',
            'password'=> 'required',
            'role'=> 'required|in:admin,manager',
        ]);

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=> Hash::make ($request->password),
            'role'=> $request->role,
        ]);

        return redirect('/login')->with('success','Akun berhasil dibuat');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request-> validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            if (Auth::user()->role=='admin'){
                return redirect()->intended('/dashboard-admin');
            }else{
                return redirect()->intended('dashboard-manager');
            }
        }

        return back()->withErrors([
            'username'=>'Usrname atau password salah'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    
}
