<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    /**
     * Tampilkan halaman forgot password.
     */
    public function showForm()
    {
        return view('login.forgot');
    }

    public function sendLink()
    {
        $user = User::first();

        if (!$user) {
            return back()->withErrors(['error' => 'Tidak ada akun admin yang terdaftar.']);
        }

        $status = Password::sendResetLink(['email' => $user->email]);

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Link reset password sudah dikirim ke email admin!')
            : back()->withErrors(['error' => 'Gagal mengirim email, coba lagi.']);
    }

    /**
     * Tampilkan form reset password (dari link di email).
     */
    public function showReset(string $token)
    {
        return view('login.reset', ['token' => $token]);
    }

    /**
     * Proses reset password baru — email diambil otomatis dari DB.
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token'                 => 'required',
            'password'              => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $email = User::first()->email;

        $status = Password::reset(
            array_merge(
                $request->only('password', 'password_confirmation', 'token'),
                ['email' => $email]
            ),
            function ($user, $password) {
                $user->forceFill(['password' => bcrypt($password)])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('admin.login')->with('success', 'Password berhasil direset! Silakan login.')
            : back()->withErrors(['error' => 'Token tidak valid atau sudah kadaluarsa.']);
    }
}