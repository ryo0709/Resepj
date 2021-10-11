<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <title>@yield('title')</title>

  <style>
    body {
      font-size: 16px;
      margin: 0 auto;
      padding: 0 12%;
      background-color: #EEEEEE;
    }
  </style>
</head>

<body>

  <h1>@yield('title')</h1>
  @yield('content')
    @include('layouts.header3')
  <div class="content">
    
  </div>

    
</body>

</html>