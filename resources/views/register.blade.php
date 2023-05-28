<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .register-container {
            max-width: 400px;
            margin: 14px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .register-container h2 {
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

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group select {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .sex{
            width: 100%!important;
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
            width: 100%;

        }

        .form-group button[type="submit"]:hover {
            background-color: #45a049;
        }
        .signup-link-container {
    text-align: center;
    margin-top: 20px;
}
.signin-link {
    color: #4caf50;
    text-decoration: none;
}

.signin-link:hover {
    text-decoration: underline;
}
    </style>
</head>

<body>
    <!-- signup.blade.php -->

    <!-- register.blade.php -->

    @extends('app')

    @section('content')
    <div class="register-container">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="sex">Sex</label>
                <select id="sex" name="sex" required class="sex">
                    <option value="" selected disabled>Select Gender</option>
                    <option value="man">Man</option>
                    <option value="female">Women</option>
                </select>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" id="role" name="role" required>
            </div>
            <div class="form-group">
                <label for="blood_type">Blood Type</label>
                <input type="text" id="blood_type" name="blood_type" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
            <div class="signup-link-container">
                do you back in login? <a href="{{ route('login') }}" class="signin-link">login</a>
            </div>
        </form>

