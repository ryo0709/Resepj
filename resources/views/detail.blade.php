@extends('layouts.default3')
<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }

  tr:nth-child(odd) td {
    background-color: #FFFFFF;
  }

  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }

  img {
    width: 100%;
    height: auto;
  }

  .card {
    width: 50%;
    cursor: pointer;
    border: 1px solid #e9eaea;
    border-radius: 3px;
  }

  .text-box {
    padding: 15px;
  }

  .content-img {
    text-align: center;
    background: #e1f3ff;
  }

  .date {
    font-size: 10px;
    margin-top: 5px;
  }

  .wrap {
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
  }

  .reservation {
    width: 50%;
    height: 100%;
  }

  .title {
    font-size: 34px;
    padding-top: 8px;
  }

  .btn {
    background-color: white;
    padding: 3px 8px;
    font-size: 16px;
    font-weight: bold;
    border: solid 1px #BBBBBB;
    border-radius: 5px;
    box-shadow: 1px 1px 1px #BBB;
    margin-right: 10px;
  }

  .btn_wrap {
    text-align: center;
  }

  .head {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    margin-top: 100px;
  }

  .content {
    padding: 0 12%;
  }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(function() {

    // selectボックスの変更時
    $('[name="num"]').change(function() {
      // textの取得
      let text = $('option:selected').text();
      // 結果の出力
      $('p').text(text);
    });
  });


  $(function() {

    // radioボタンの変更時
    $('input[type="date"]').change(function() {
      // valueの取得
      let val = $(this).val();
      // 結果の出力
      $('date').text(val);
    });
  });
  $(function() {

    // radioボタンの変更時
    $('input[type="time"]').change(function() {
      // valueの取得
      let val = $(this).val();
      // 結果の出力
      $('num').text(val);
    });
  });
</script>

 

@section('title')

@section('content')

@if (Auth::check())


<div class="wrap">
  <div class="card">
    <div class="head">
      <div class="btn-warp"><a class="btn" href="/">></a></div>
      <h2 class="title">{{$shop->name}}</h2>
    </div>
    <div class="content-img">
      <img src="{{$shop->image_url}}" />
    </div>
    <div class="text-box">
      <p class="date">{{$shop->getArea()}} {{$shop->getGenre()}}</p>
      <p>{{$shop->description}}</p>
    </div>
  </div>
  <div class="reservation">
    <form action="/reserve" method="post">
      @csrf
      <div>
        <div>
          <input type="date" name="reservation_date">
          <input type="time" min="09:00" max="16:59" step="1800" required>
          <select name="reservation_time">
            <option value="17:00">17:00</option>
            <option value="17:30">17:30</option>
            <option value="18:00">18:00</option>
          </select>
        </div>
        <div>
          <select name="num" id="num">
            <option value="1人">1人</option>
            <option value="2人">2人</option>
            <option value="3人">3人</option>
          </select>
        </div>

        <div id="out1"></div>
        <p>
        </p>
        <date></date>
        <p>
<input type="text" value="p">
        </p>
        
        
        <div>
          <input name="user_id" value="{{$user->id}}" type="hidden">
          <input name="shop_id" value="{{$shop->id}}" type="hidden">
          <input type="submit" value="予約する" class="">
        </div>
      </div>
    </form>
  </div>
</div>

@else
<p>ログインしていません。（<a href="/login">ログイン</a>｜
  <a href="/register">登録</a>）
</p>
<div class="wrap">
  <div class="card">
    <div class="content-img">
      <img src="{{$shop->picture}}" />
    </div>
    <div class="text-box">
      <h2 class="title">
        {{$shop->name}}
      </h2>
      <p class="date">{{$shop->getArea()}} {{$shop->getCategory()}}</p>
      <p>{{$shop->outline}}</p>
    </div>
  </div>
</div>
<div class="reserve">
  <form action="/reserve" method="post">
    @csrf
    <input type="date" name="reservation_date">
    <select name="reservation_time">
      <option value="17:00">17:00</option>
      <option value="17:30">17:30</option>
      <option value="18:00">18:00</option>
    </select>
    <select name="number">
      <option value="1人">1人</option>
      <option value="2人">2人</option>
      <option value="3人">3人</option>
    </select>
    <input type="submit" value="予約する" class="btn">
  </form>
</div>
@endif
@endsection