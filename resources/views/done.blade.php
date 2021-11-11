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

  .done {
    position: fixed;
    width: 300px;
    margin: 100px auto;
    padding-top: 80px;
    background-color: white;
    padding: 50px 0;
    margin-left: 15%;
    border: solid 1px #BBBBBB;
    border-radius: 5px;
    box-shadow: 1px 1px 1px #BBB;
  }

  .flex {
    height: 1px;
  }
</style>


@section('content')
<div class="section">
  <div class="done">
    <p>ご予約ありがとうございます。</p>
    <div class="btn_wrap">
      <a class="btn" href="/mypage">戻る</a>
    </div>
  </div>

</div>

@endsection