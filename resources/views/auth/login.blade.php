<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="images/img_login.png" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <p class="login-card-description">Selamat Datang Kembali</p>
                            <p class="login-card-description">Daftar Sekarang</p>
                            <p><small class="text-muted">Daftarkan akunmu dengan cepat dan mudah.</small></p>
                            <form action="{{ route('login.post') }}" method="POST" id="loginForm">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email address">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Kata Sandi">
                                </div>
                                <button type="submit" class="btn btn-block login-btn mb-4">Login</button>
                            </form>
                            <div class="d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me-checkbox">
                                    <label class="form-check-label" for="remember-me-checkbox">Remember me</label>
                                </div>
                                <div style="margin-left: 16%;">
                                    <a href="#!" class="forgot-password-link">Forgot password?</a>
                                </div>
                            </div>
                            <br>
                            <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}"
                                    class="text-reset">Register here</a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}'
            });
        </script>
    @elseif(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}'
            });
        </script>
    @endif

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
