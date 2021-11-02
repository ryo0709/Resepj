<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ secure_asset('public/css/reset.css') }}">
  <title>@yield('title')</title>
  <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


  <style>
    body {
      font-size: 16px;
      margin: 0 auto;
      background-color: #EEEEEE;
    }
  </style>
</head>

<body>
  @include('layouts.header2')

  <h1>@yield('title')</h1>
  <div class="content">
    @yield('content')

  </div>

</body>

</html>