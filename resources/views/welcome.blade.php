<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di API Presensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: linear-gradient(135deg, #FFD700 0%, #FFD700 50%, #f4f4f4 50%);
            background-size: 200% 100%;
            animation: gradient-animation 3s ease infinite;
        }
        @keyframes gradient-animation {
            0% { background-position: 100% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .welcome-message {
            margin-top: 20%;
            color: #333;
            animation: text-animation 3s ease infinite;
        }
        @keyframes text-animation {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="welcome-message">
        <h1>Selamat Datang di API Presensi</h1>
        <p>API ini digunakan untuk mengatur presensi karyawan. Silakan gunakan API ini dengan bijak.</p>
    </div>
</body>
</html>
