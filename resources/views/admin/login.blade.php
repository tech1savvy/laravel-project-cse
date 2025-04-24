<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #c2e59c 0%, #ffffff 50%, #64b3f4 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            background: #fff;
        }
        .login-btn {
            border-radius: 2rem;
            padding: 0.75rem 2rem;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .login-logo {
            width: 80px;
            margin-bottom: 1rem;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem #b4459333;
            border-color: #b44593;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                <div class="card login-card p-4">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <!-- <img src="img/logo.png" alt="Logo" class="login-logo"> -->
                            <h3 class="mb-0 text-primary">Admin Login</h3>
                            <p class="text-muted mb-0">Sign in to your admin dashboard</p>
                        </div>
                        <form method="POST" action="{{ route('adminLoginPost') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control py-2" id="email" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control py-2" id="password" name="password" placeholder="Enter password" required>
                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger py-2">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary login-btn">Login</button>
                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- <a href="#" class="text-secondary small">Forgot password?</a> -->
                                <a href="/" class="text-secondary small">Back to Home</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center text-black mt-4">
                    <small>&copy; {{ date('Y') }} HighTech Agency. All rights reserved.</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (optional for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
