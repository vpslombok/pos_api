<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Presensi;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;

class EmailpresensiController extends Controller
{
    public function sendEmail()
    {
        $tanggalSekarang = now()->format('Y-m-d');
        $users = User::all();
        $setting = Setting::first();

        foreach ($users as $user) {
            // Mengambil semua tanggal kecuali tanggal berjalan
            $tanggalLain = Presensi::where('user_id', $user->id)
                ->where('tanggal', '!=', $tanggalSekarang)
                ->pluck('tanggal');

            // validasi user tidak presensi masuk dan keluar berdasarkan tanggal di atas
            $tidak_presensi = Presensi::where('user_id', $user->id)
                ->whereIn('tanggal', $tanggalLain)
                ->where(function ($query) {
                    $query->whereNull('waktu_masuk')
                        ->orWhereNull('waktu_keluar');
                })
                ->get();

            // buatkan pesan jika user tidak presensi pulang
            if ($tidak_presensi->count() > 0) {
                $emailData = [
                    'tidak_presensi' => $tidak_presensi,
                    'user' => $user,
                    'setting' => $setting
                ];

                // kirimkan email ke user yang tidak lengkap presensinya
                Mail::send('email.presensi', $emailData, function ($message) use ($user) {
                    $message->to($user->email)
                        ->subject('Reminder Presensi');
                });
            }
        }
    }
}
