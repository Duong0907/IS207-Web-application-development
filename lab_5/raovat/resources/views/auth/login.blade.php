<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
    <title>Login</title>
</head>
<body>
    <div class="log-form">
        <h2>Đăng nhập</h2>
        <form method="post" action="/controller/login">
          @csrf
          <input name="name" type="text" title="Tên tài khoản" placeholder="Tên tài khoản" value="Duong" />
          <input name="password" type="password" title="Mật khẩu" placeholder="Mật khẩu" value="" />
          <button type="submit" class="btn">Đăng nhập</button>

          @if ($errors->any())
          <p style="color: red">{{ $errors->all()[0] }}</p>
          @endif

          <a class="forgot" href="/register">Chưa có tài khoản?</a>
        </form>
      </div>
</body>
</html>