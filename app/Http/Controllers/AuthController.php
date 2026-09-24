<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->intended('/admin');
        }

        return Inertia::render('auntetication/LoginView');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        // Kirim error ke key 'login_error'
        throw ValidationException::withMessages([
            'login_error' => 'Email atau kata sandi yang Anda masukkan salah.',
        ]);
    }

   public function logout(Request $request)
    {
        // 1. Logout user dari guard Auth
        Auth::logout();

        // 2. Hapus semua data session user & batalkan session ID yang aktif
        $request->session()->invalidate();

        // 3. Regenerasi CSRF Token untuk keamanan
        $request->session()->regenerateToken();

        // 4. Arahkan kembali ke halaman login
        return redirect()->route('login');
    }
}
