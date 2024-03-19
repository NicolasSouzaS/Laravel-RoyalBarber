<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset ('fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="css/login.css">
    <title>Login - RoyalBarber</title>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <img src="{{ asset ('images/bg-login.jpeg') }}" alt="">
            <h2>Bem-vindo!!!</h2>
            <form action="{{ route ('login') }}" method="POST" class="login-form">
                @csrf
                <div class="textbox">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                </div>
                <div class="textbox">
                    <input type="password" name="password" placeholder="Senha" value="{{ old ('password') }}">
                    {{ $errors->has('password') ? $errors->first('password') : '' }}
                </div>
                <input type="submit" class="btn" value="Entrar">
            </form>
        </div>
    </div>
</body>
</html>
