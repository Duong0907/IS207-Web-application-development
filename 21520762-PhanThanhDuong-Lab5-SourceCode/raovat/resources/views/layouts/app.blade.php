<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>RaoVat.Com</title>

  <!-- Bootstrap  -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- FontAwsome -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="{{ asset('css/app.css')}}">

  {{-- favicon  --}}
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <style>
  </style>
  @yield('css')
</head>

<body>
    @include('shared.navbar')

    @yield('content')
  
    @include('shared.footer')
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    @yield('js')
</body>
</html>