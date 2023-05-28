<!-- login.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button[type="submit"]:hover {
            background-color: #45a049;
        }

        .signup-link-container {
            text-align: center;
            margin-top: 20px;
        }

        .signup-link {
            color: #4caf50;
            text-decoration: none;
        }

        .signup-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>

        </form>
        <div class="signup-link-container">
            Don't have an account? <a href="{{ route('register') }}" class="signup-link">Sign up</a>
        </div>
    </div>


    @if (session('token'))
        <script>
            const token = "{{ session('token') }}";
            localStorage.setItem('token', token);
            console.log(localStorage.getItem('token'));
            window.location.href = "/info";

        </script>
    @endif

    @if (isset($token))
        <script>
            const token = "{{ $token }}";
            localStorage.setItem('token', token);
            console.log(localStorage.getItem('token'));
            window.location.href = "/info";

        </script>
    @endif
</body>

</html>
