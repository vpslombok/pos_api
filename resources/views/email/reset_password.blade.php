<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .button {
            display: inline-block;
            background-color: #007bff; /* Warna biru cerah untuk tombol */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 20px;
            font-size: 16px;
            margin-top: 20px;
        }
        .container {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 10px;
            background-color: #f4f4f4; /* Warna background abu-abu muda */
        }
        .header {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333333;
            font-weight: bold; /* Membuat teks header lebih tebal */
        }
        .content {
            font-size: 16px;
            color: #555555;
            text-align: justify; /* Membuat teks konten rata kiri dan kanan */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Reset Password</div>
        <div class="content">
            <p>Anda telah meminta untuk mereset password Anda. Klik tombol di bawah ini untuk mengubah password Anda.</p>
            <p>Waktu Expired : {{ $expired_at }}</p>
            <br>
            <a href="{{ $link }}" class="button">Reset Password</a>
            <p>Perlu diingat, tautan ini hanya valid untuk beberapa jam. Jika Anda tidak mengubah password dalam waktu yang ditentukan, Anda harus meminta reset password lagi.</p>
            <p>Nama: {{ $name }}</p>
            <p>Email: {{ $email }}</p>
            <p>NIK: {{ $nik }}</p>
        </div>
    </div>
</body>
</html>
