<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login {{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://kit.fontawesome.com/a2d9d6c11f.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="login-card">
        <i class="fas fa-bug icon-bug"></i>
        <h3>Login Monitoring Hama Padi</h3>
        <form>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
            </div>
            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>
        <!-- <p class="text-center mt-3 mb-0">Belum punya akun? <a href="#" class="text-success fw-bold">Daftar</a></p> -->
    </div>

</body>

</html>
