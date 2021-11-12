@extends('layouts.default')

<style>
  .btn {
    background-color: blue;
    color: white;
    width: 100px;
    border-radius: 5px;
    padding: 5px 10px;
    font-size: 12px;
    text-decoration: none;
  }

  .btn_wrap {
    text-align: center;
    margin: 40px;
  }

  p {
    text-align: center;
    font-weight: 500;
    letter-spacing: 1px;
  }

  .section {
    position: fixed;
    width: 300px;
    top: 20%;
    left: 35%;
    background-color: white;
    padding: 50px 0;
    border: solid 1px #BBBBBB;
    border-radius: 5px;
    box-shadow: 1px 1px 1px #BBB;
  }
</style>


@section('content')
<div class="section">
  <p>会員登録ありがとうございます</p>
  <div class="btn_wrap">
    <a class="btn" href="/login">ログインする</a>
  </div>
</div>
@endsection