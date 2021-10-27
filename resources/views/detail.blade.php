@extends('layouts.default')
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
    border: 1px solid #e9eaea;
    border-radius: 3px;
    padding-right: 5%;
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
    background-color: #0033FF;
    border-radius: 5px;
    box-shadow: 1px 1px 1px #BBB;
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
  }

  .reservation_detail {
    background-color: #0033FF;
    border-radius: 5px;
    box-shadow: 1px 1px 1px #BBB;
    opacity: 0.9;
  }

  .reservation_detail_wrap {
    padding: 30px 20px 10px 20px;
  }

  .item_wrap {
    display: flex;
    padding-bottom: 20px;
  }

  .item {
    width: 100px;
    color: white;
    font-weight: bold;
  }

  .reservation {
    background-color: #0033FF;
    border-radius: 5px;
    box-shadow: 1px 1px 1px #BBB;
  }

  .reservation_wrap {
    padding: 0 40px;
  }

  .reservation_title {
    font-size: 34px;
    color: white;
    padding: 40px 0;
  }

  .reservation_input {
    border-radius: 5px;
    box-shadow: 1px 1px 1px #BBB;
    margin-bottom: 20px;
    height: 24px;
  }

  select {
    width: 90%;
    border-radius: 5px;
    box-shadow: 1px 1px 1px #BBB;
    margin-bottom: 20px;
    height: 30px;
  }

  .reservation_btn_wrap {
    text-align: center;
    margin-top: 120px;
    border: none;
    background-color: #0033FF;
    color: white;
  }

  .reservation_btn {
    border: none;
    background-color: #0033FF;
    color: white;
    font-weight: bold;
    font-size: 16px;
    padding: 20px 0;
    cursor: pointer;
  }
</style>
@section('title')

@section('content')


<div class="content">
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
    </div><!-- card -->
    <div class="reservation">
      <div class="reservation_wrap">
        <h2 class="reservation_title">予約</h2>
        <form action="/reservation" method="post">
          @csrf
          <div>
            @if (Auth::check())
            <input name="user_id" value="{{$user->id}}" type="hidden">
            @else
            @endif
            <input name="shop_id" value="{{$shop->id}}" type="hidden">
            <div>
              @error('date')
              <p style="color:red;">{{$message}}</p>
              @enderror
              <input type="date" name="date" value="{{ $date }}" id="date" class="reservation_input">
            </div>
            <div>
              @error('time')
              <p style="color:red;">{{$message}}</p>
              @enderror
              <select name="time" value="{{ $time }}" id="time">
                <option value=""></option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
              </select>
            </div>
            <div>
              @error('num')
              <p style="color:red;">{{$message}}</p>
              @enderror
              <select name="num" value="{{ $num }}" id="num">
                <option value=""></option>
                <option value="1">1人</option>
                <option value="2">2人</option>
                <option value="3">3人</option>
              </select>
            </div>
          </div>
          <div class="reservation_detail">
            <div class="reservation_detail_wrap">
              <div class="item_wrap">
                <p class="item">Shop</p>
                <p style="color:white;">{{$shop->name}}</p>
              </div>
              <div class="item_wrap">
                <p class="item">Date</p>
                <p style="color:white;" id="pDate"></p>
              </div>
              <div class="item_wrap">
                <p class="item">Time</p>
                <p style="color:white;" id="pTime"></p>
              </div>
              <div class="item_wrap">
                <p class="item">Number</p>
                <p style="color:white;" id="pNum"></p>
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script>
                  $('#date').change(function() {
                    var date = $('#date').val();
                    $('#pDate').text(date);
                  });
                  $('#time').change(function() {
                    var time = $('#time').val();
                    $('#pTime').text(time);
                  });
                  $('#num').change(function() {
                    var num = $('#num').val();
                    $('#pNum').text(num + '人');
                  });
                </script>
              </div>
            </div>
          </div>

      </div><!-- resavation_wrap -->
      <div class="reservation_btn_wrap" style="border-top:solid 1px #BBB;border-radius:0 0 5px 5px;">
        @if (Auth::check())

        <label for="reservation"><input type="submit" value="予約する" class="reservation_btn" id="reservation" style="width:100%;"></label>
        @else
        <p>ログインしていません。（<a href="/login" style="color:white;">ログイン</a>｜
          <a href="/register" style="color:white;line-height:30px;padding-bottom:20px;display:inline-block;">登録</a>）
        </p>
        @endif
      </div>
      </form>
    </div><!-- resavation -->
  </div><!-- warap -->
</div><!-- content -->


@endsection