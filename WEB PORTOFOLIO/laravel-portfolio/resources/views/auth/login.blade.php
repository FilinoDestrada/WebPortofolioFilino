<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | CRUD</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('{{ asset('images/BackgroundIno.jpeg') }}');
            background-size: cover;
            background-position: center;
        }
        .login-box {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(12px);
            padding: 40px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }
        .login-box h2 { color: #ffffff; margin-bottom: 20px; }
        .login-box input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(0, 0, 0, 0.2);
            color: #fff;
            box-sizing: border-box;
        }
        .login-box input::placeholder { color: #cbd5e1; }
        .login-btn {
            width: 100%;
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 15px;
            transition: 0.3s;
        }
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(14, 165, 233, 0.5);
        }
        .error { color: #ef4444; margin-bottom: 15px; background: rgba(239, 68, 68, 0.1); padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login Admin</h2>

        @if($errors->has('login'))
            <div class="error">{{ $errors->first('login') }}</div>
        @endif

        <p style="font-size: 0.85rem; color: #94a3b8; margin-bottom: 20px;">
            Default Login -> <br>User: <strong>admin</strong> | Pass: <strong>admin</strong>
        </p>

        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" autocomplete="off" value="{{ old('username') }}" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="login-btn">Log In</button>
            <a href="{{ route('home') }}" style="display: block; margin-top: 20px; color: #94a3b8; text-decoration: none; font-size: 0.9rem;">&larr; Kembali ke Home</a>
        </form>
    </div>
</body>
</html>
