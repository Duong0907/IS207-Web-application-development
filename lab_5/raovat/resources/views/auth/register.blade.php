<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
    <title>Đăng ký</title>
</head>
<body>
    <div class="log-form">
        <h2>Đăng ký</h2>
        <form method="post" action="/controller/register">
          @csrf
          <input name="name" type="text" title="Tên tài khoản" placeholder="Tên tài khoản" />
          <input name="email" type="text" title="Email" placeholder="Email" />
          <input name="password" type="password" title="Mật khẩu" placeholder="Mật khẩu" />
          {{-- <input name="verify" type="password" title="Nhập lại mật khẩu" placeholder="Nhập lại mật khẩu" /> --}}
          <button type="submit" class="btn">Đăng ký</button>

          @if ($errors->any())
          <p style="color: red">{{ $errors->all()[0] }}</p>
          @endif

          <a class="forgot" href="/login">Đã có tài khoản?</a>
        </form>
      </div>
</body>
</html>