<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Sign_In - AbsensiKu</title>

    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 15px;
        }

        .login-container {
            width: 100%;
            max-width: 350px;
        }

        .card {
            border-radius: 6px;
            border: 1px solid #dee2e6;
        }

        .card-body {
            padding: 1.25rem !important;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 0.25rem; 
        }

        .logo {
            max-width: 130px;
            height: auto;
            margin-bottom: 0.1rem;
        }

        .login-title {
            font-size: 1.2rem;
            margin: 0 !important;
            line-height: 1.2;
            color: #333;
        }

        .form-label {
            font-size: 0.8rem;
            margin-bottom: 0.2rem;
            color: #555;
        }

        .form-control {
            padding: 0.35rem 0.65rem;
            font-size: 0.8rem;
            border-radius: 3px;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.15rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            padding: 0.45rem;
            font-size: 0.8rem;
            border-radius: 3px;
            font-weight: 500;
        }

        .fw-semibold {
            font-size: 0.8rem;
            margin-bottom: 0.2rem;
        }

        .text-center p {
            font-size: 0.75rem;
            margin-bottom: 0;
        }

        .sign-in-link {
            font-size: 0.75rem;
            font-weight: 500;
            text-decoration: none;
        }

        .sign-in-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .logo {
                max-width: 130px;
            }

            .login-title {
                font-size: 1.15rem;
            }

            .card-body {
                padding: 1rem !important;
            }
        }
    </style>
</head>

<body>

<div class="login-container">
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="AbsensiKu Logo" class="logo">
                <h1 class="fw-bold login-title">Sign-In</h1>
            </div>

            <form action="{{ url('aksi_sign') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-2">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="u" required>
                </div>

                <div class="mb-2">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="p" required>
                </div>

                                <div class="mb-2">
                <label class="form-label">Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    name="e" 
                    required
                        >
                    </div>

                                    <div class="mb-3">
                    <div id="math-captcha">
                        <p id="math-question" class="fw-semibold"></p>
                        <input type="text" name="math_answer" class="form-control" required>
                        <input type="hidden" name="math_result" id="math_result" required>
                    </div>
                </div>


                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>

                    <div class="text-center mt-3">
                    <p>sudah punya akun?
                        <a href="/login" class="sign-in-link">Login</a>
                    </p>
                </div>

            </form>

        </div>
    </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const a = Math.floor(Math.random() * 10) + 1;
    const b = Math.floor(Math.random() * 10) + 1;

    document.getElementById("math-question").innerText =
        `Berapa ${a} + ${b} ?`;

    document.getElementById("math_result").value = a + b;
});
</script>

</body>
</html>
