<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Password_resets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetpasswordController extends Controller
{
    public function showResetForm(Request $request)
    {
        $token = $request->route('token');
        return view('auth.reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'required' => 'Kolom :attribute tidak boleh kosong.',
            'min' => [
                'string' => 'Kolom :attribute minimal harus :min karakter.',
            ],
            'confirmed' => 'Konfirmasi :attribute tidak cocok.',
        ]);

        $token = $request->token;
        $reset = Password_resets::where('token', $token)->first();

        if (!$reset) {
            return back()->withErrors(['token' => 'Link Reset Salah Atau Sudah Kadaluarsa'])->withInput();
        }

        // Cek apakah token sudah expired atau belum
        if ($reset->expired_at < now()) {
            // Jika sudah expired, hapus token
            Password_resets::where('token', $token)->delete();
            return back()->withErrors(['token' => 'Link Reset Sudah Expired.'])->withInput();
        }

        $user = User::where('email', $reset->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.'])->withInput();
        }

        $user->forceFill([
            'password' => Hash::make($validatedData['password']),
        ])->save();
        // Hapus token reset password yang sudah digunakan berdasarkan token
        Password_resets::where('token', $token)->delete();

        return view('welcome', ['status' => 'Password berhasil direset. Silakan login dengan password baru Anda di Aplikasi Presensi.']);
    }
}
