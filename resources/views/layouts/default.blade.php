<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @if(app('env')=='local')
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  @else
  <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}">
  @endif
  <title>@yield('title')</title>
  <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
  <style>
    body {
      font-size: 16px;
      margin: 0 auto;
      padding: 0 12%;
      background-color: #E6E6E6;
    }
  </style>
</head>

<body>
  @include('layouts.header')
  @yield('content')
  <div class="content">
  </div>
  @extends('modal')
</body>

</html>