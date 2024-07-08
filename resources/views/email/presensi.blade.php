<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reminder Presensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <p>Pemberitahuan: Anda memiliki presensi yang belum lengkap. Berikut adalah rinciannya:</p>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tidak_presensi as $presensi)
                <tr>
                    <td>{{ $presensi->tanggal }}</td>
                    <td>{{ $presensi->waktu_masuk ?? 'Tidak Ada' }}</td>
                    <td>{{ $presensi->waktu_keluar ?? 'Tidak Ada' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>NIK: {{ $user->nik }} </p>
    <p>Nama: {{ $user->name }} </p>
    <p>Perusahaan: {{ $setting->nama_perusahaan }} </p>
</body>
</html>
