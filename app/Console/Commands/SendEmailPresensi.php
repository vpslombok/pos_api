<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Presensi;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;

class SendEmailPresensi extends Command
{
    // The name and signature of the command
    protected $signature = 'email:presensi';

    // The console command description
    protected $description = 'Send presensi reminder emails to users with incomplete presensi';

    public function handle()
    {
        $tanggalSekarang = now()->format('Y-m-d');
        $users = User::all();
        $setting = Setting::first();

        foreach ($users as $user) {
            // Mengambil semua tanggal kecuali tanggal berjalan
            $tanggalLain = Presensi::where('user_id', $user->id)
                ->where('tanggal', '!=', $tanggalSekarang)
                ->pluck('tanggal');

            // Validasi user tidak presensi masuk dan keluar berdasarkan tanggal di atas
            $tidak_presensi = Presensi::where('user_id', $user->id)
                ->whereIn('tanggal', $tanggalLain)
                ->where(function ($query) {
                    $query->whereNull('waktu_masuk')
                          ->orWhereNull('waktu_keluar');
                })
                ->get();

            // Buatkan pesan jika user tidak presensi pulang
            if ($tidak_presensi->count() > 0) {
                $emailData = [
                    'tidak_presensi' => $tidak_presensi,
                    'user' => $user,
                    'setting' => $setting
                ];

                // Kirimkan email ke user yang tidak lengkap presensinya
                Mail::send('email.presensi', $emailData, function ($message) use ($user) {
                    $message->to($user->email)
                            ->subject('Reminder Presensi');
                });
            }
        }

        $this->info('Presensi reminder emails sent successfully.');
    }
}
