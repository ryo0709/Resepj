<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @if(app('env')=='local')
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  @else
  <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}">
  @endif
  <title>RESE</title>
  <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


  <style>
    body {
      font-size: 16px;
      margin: 0 auto;
      background-color: #E6E6E6;
    }
    
  </style>
</head>

<body>
  @include('layouts.header2')

  @yield('title')
  <div class="content">
    @yield('content')

  </div>

</body>

</html>