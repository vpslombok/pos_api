<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f4f4; /* Warna background abu-abu muda */
        }
        .card {
            background: #ffffff; /* Warna background putih untuk form */
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); /* Efek bayangan untuk form */
            margin-top: 50px; /* Menambahkan jarak dari atas */
        }
        .card-header {
            background: #007bff; /* Warna biru cerah untuk header */
            color: white; /* Warna teks putih untuk header */
            padding: 20px; /* Menambahkan jarak dalam header */
            border-radius: 10px 10px 0 0; /* Mengubah bentuk sudut header */
        }
        .card-body {
            padding: 30px; /* Menambahkan jarak dalam body */
        }
        .form-group {
            margin-bottom: 20px; /* Menambahkan jarak antar form group */
        }
        .form-control {
            border-radius: 20px; /* Mengubah bentuk sudut input */
            padding: 10px; /* Menambahkan jarak dalam input */
        }
        .btn-primary {
            border-radius: 20px; /* Mengubah bentuk sudut tombol */
            padding: 10px 20px; /* Menambahkan jarak dalam tombol */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>

                    <div class="card-body">
                        @if (session()->has('status'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('kirim.data') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


