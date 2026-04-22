<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register'); // Menampilkan form pendaftaran
    }

    public function store(Request $request) {
        // 1. Validasi Input Dasar
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'g-recaptcha-response' => 'required',
        ]);

        // 2. Verifikasi reCAPTCHA ke Google API
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('NOCAPTCHA_SECRET'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!$response->json('success')) {
            return back()->withErrors(['g-recaptcha-response' => 'Terdeteksi Robot! Silakan coba lagi.'])->withInput();
        }

        // 3. Simpan ke Database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
        ]);

        // 4. Redirect ke Login
        return redirect()->route('login')->with('success', 'Akun ISMEI Anda berhasil dibuat!');
    }
}