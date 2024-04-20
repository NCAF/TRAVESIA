<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // login controller
    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                // Login berhasil
                return redirect('/destinasi');
            } else {
                // Login gagal
                return back()->withErrors([
                    'email' => 'Password Atau Email Salah! Silahkan Check kembali.',
                ])->withInput();
            }
        } catch (\Exception $e) {
            // Capture the error and display a SweetAlert
            $error = $e->getMessage();
            return back()->withErrors(['error' => $error])->withInput();
        }
    }
    //register controller
    public function registerForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')->with('success', 'Akun Berhasi Dibuat,Silahkan Login.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
