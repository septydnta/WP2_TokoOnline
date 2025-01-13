<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login SIMARKET</title>
    <link rel="stylesheet" href="{{ asset('backend/dist/css/style.min.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/keranjang.png') }}">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: url('{{ asset('image/bg.jpeg') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .main-wrapper {
            min-height: 100vh;
            backdrop-filter: blur(8px);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-text {
            font-weight: bold;
            font-size: 1.5rem;
            background: linear-gradient(45deg, #4CAF50, #FFC107);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .auth-box {
            max-width: 400px;
            width: 100%;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .form-control {
            height: 45px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        .btn-primary {
            background: #4CAF50;
            border: none;
        }

        .btn-primary:hover {
            background: #45a049;
        }

        #to-recover {
            color: #6c757d;
        }

        #to-recover:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="main-wrapper d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="auth-box">
            <div class="text-center mb-4">
                <img src="{{ asset('image/keranjang.png') }}" alt="logo" style="max-width: 100px;" />
                <h4 class="mt-3 logo-text">SIMARKET</h4>
            </div>
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('backend.login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                        placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="#" id="to-recover" class="text-decoration-none">Forgot Password?</a>
                </div>
            </form>
            <div id="recoverform" class="mt-4" style="display: none;">
                <p>Enter your email address to recover your password.</p>
                <form>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" id="to-login">Back to Login</button>
                        <button type="button" class="btn btn-success">Recover</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('backend/libs/jquery/dist/jquery.min.js') }}"></script>
    <script>
        $('#to-recover').on("click", function() {
            $("form").first().slideUp();
            $("#recoverform").slideDown();
        });
        $('#to-login').on("click", function() {
            $("#recoverform").slideUp();
            $("form").first().slideDown();
        });
    </script>
</body>

</html>
