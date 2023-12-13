<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
<body>
<style>
    /* Style the body */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }

    /* Style the login form */
    #login-form {
        width: 360px;
        margin: 80px auto;
        padding: 30px;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    /* Style the login form text input */
    #login-form input[type="text"],
    #login-form input[type="password"] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        outline: none;
    }

    /* Style the login form submit button */
    #login-form input[type="submit"] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    /* Style the login form submit button on hover */
    #login-form input[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Style the login form checkbox */
    #login-form input[type="checkbox"] {
        margin-bottom: 10px;
    }

    /* Style the login form label */
    #login-form label {
        font-size: 14px;
        color: #555;
    }
</style>
</body>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('E-mail Address') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
