<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengingat Presensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f0f0f0;
        }
        .merah {
            color: red;
        }
    </style>
</head>
<body>
    <p>Yang terhormat {{ $user->name }}</p>
    <p>Perhatian: Anda memiliki beberapa tanggal yang belum lengkap presensinya. Silakan lengkapi presensi Anda untuk tanggal-tanggal berikut:</p>
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
                    <td class="{{ $presensi->waktu_keluar ? '' : 'merah' }}">{{ $presensi->waktu_keluar ?? 'Tidak Ada' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Copyright {{ $setting->nama_perusahaan }} </p>
</body>
</html>
