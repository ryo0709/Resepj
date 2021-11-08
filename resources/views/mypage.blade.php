@extends('layouts.default')
<link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
<style>
  img {
    width: 100%;
  }

  .card {
    width: 42%;
    margin-bottom: 20px;
    margin-right: 20px;
    border: solid 1px #BBBBBB;
    border-radius: 5px;
    box-shadow: 1px 1px 1px #BBB;
  }

  .text-box {
    padding: 15px;
    background-color: white;
  }

  .content-img {
    text-align: center;
    background: #e1f3ff;
  }

  .date {
    font-size: 10px;
    margin-top: 10px;
    font-weight: bold;
  }

  .wrap {
    padding-left: 12%;
    align-items: center;
    display: flex;
    flex-wrap: wrap;
  }

  .btn {
    background-color: blue;
    color: white;
    border-radius: 5px;
    margin-top: 5px;
    font-weight: 400;
    color: white;
    padding: 4px 8px;
  }

  .btn_wrap {
    text-align: right;
  }

  .card_item {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  a {
    color: white;
  }

  .like-btn {
    width: 30px;
    height: 35px;
    font-size: 30px;
    color: #808080;
    margin-top: 12px;
  }

  .unlike-btn {
    width: 30px;
    height: 35px;
    font-size: 30px;
    color: #e54747;
    margin-left: 20px;
  }

  .liked {
    color: red;
  }

  .content {
    display: flex;
    justify-content: space-between;
  }

  .reservation {
    width: 50%;
  }

  .resevation-detail {
    background-color: #0033FF;
    line-height: 40px;
    margin-right: 18%;
    border: solid 1px #BBBBBB;
    border-radius: 5px;
    box-shadow: 1px 1px 1px #bbb;
    padding: 20px 0;
  }

  .liked-shop {
    flex-wrap: wrap;
    width: 50%;
  }


  .liked-shop-detail {
    display: flex;
    flex-wrap: wrap;
  }

  .user_name {
    text-align: center;
  }

  .tit {
    line-height: 60px;
  }

  .tit2 {
    margin-top: 16px;
    line-height: 60px;
  }

  .section {
    display: flex;
  }

  .section_name {
    margin-right: 40px;
    padding-left: 40px;
    width: 80px;
    font-weight: bold;
    color: white;
  }

  .section_detail {
    color: white;
    padding-right: 5px;
  }

  .clock {
    color: white;
  }

  .resevation_header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-left: 40px;
  }

  .resevation_header_tit {
    display: flex;
    align-items: center;
  }

  .resevation_header_tit h2 {
    padding-left: 20px;
    color: white;
  }

  .round_btn {
    display: block;
    width: 30px;
    height: 30px;
    border: 2px solid white;
    color: white;
    border-radius: 50%;
    background-color: #0033FF;
    font-size: 20px;
    line-height: 15px;
    margin-left: 20px;
  }

  .fa-paperclip {
    color: white;
  }

  .tool {
    display: flex;
    margin-right: 20px;
    align-items: center;
  }

  .resevation_change {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    height: 420px;
    /* background-color: #dfdddd; */
    background-color: #0033FF;
    border-radius: 5px;
    z-index: 11;
    padding: 2rem;
  }

  .overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.5);
    width: 100%;
    height: 100%;
    z-index: 10;
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
    cursor: pointer;
  }

  input {
    cursor: pointer;
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

  .item_wrap {
    display: flex;
  }

  .item {
    width: 100px;
    color: white;
    font-weight: bold;
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

  .resevation_change_tit {
    display: flex;
    justify-content: space-between;
    color: white;
  }

  .change_date {
    margin-bottom: 20px;
  }

  .mypage_content_title {
    display: flex;
    align-items: center;
    width: 100%;
  }

  .reservation-title {
    width: 50%;
  }

  .likes_title_second {
    display: none;
  }
  .close {
    cursor: pointer;
  }

  @media screen and (max-width: 1080px) {
    .btn {
      font-size: 12px;
      padding: 8px 4px;
    }

    .card_item {
      width: 100%;
    }

    .date {
      font-size: 6px;
    }

    .text-box {
      padding-left: 4px;
    }
  }

  @media screen and (max-width: 785px) {


    .title {
      font-size: 16px;
    }

    .content {
      display: block;
    }

    .reservation {
      display: flex;
      flex-wrap: wrap;
      width: 100%;
    }

    .resevation-detail {
      width: 45%;
      margin-right: 2px;
      line-height: 22px;
    }

    .mypage_content_title {
      width: auto;
    }

    .reservation-title {
      width: auto;
    }

    .likes_title {
      display: none;
    }

    .section_name {
      margin-right: 0px;
      padding-left: 2px;
    }

    .resevation_header {
      padding-left: 2px;
    }

    .resevation_header_tit h2 {
      padding-left: 2px;
    }

    .round_btn {
      margin-left: 5px;
    }

    .liked-shop {
      width: 100%;
    }

    .card {
      width: 45%;
      margin-right: 10px;
      margin-bottom: 10px;
      border: solid 1px #BBBBBB;
      border-radius: 5px;
      box-shadow: 1px 1px 1px #BBB;
    }

    .btn {
      font-size: 16px;
      padding: 4px 8px;
    }

    .likes_title_second {
      display: block;
    }

    .resevation_change {
      width: 50%;
      height: 50%;
    }

    .reservation_detail_wrap {
      padding: 5px;
    }
    .item {
      width: 70px;
    }

  }

  .modal {
    cursor: pointer;
  }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(function() {
    let like = $('.like-toggle');
    let likeShopId;
    let likeUserId;
    like.on('click', function() {
      let $this = $(this);
      likeShopId = $this.data('shop-id');
      likeUserId = $this.data('user-id');
      $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: '/liked',
          method: 'get',
          data: {
            'shop_id': likeShopId,
            'user_id': likeUserId
          },
        })
        .done(function(data) {
          $this.toggleClass('liked');
          $this.next('.like-counter').html(data.review_likes_count);
        })
        .fail(function() {
          console.log('fail');
        });
    });
  });

  function confirm_test() {
    var select = confirm("ご予約を削除してよろしいですか？");
    return select;
  }
</script>
@section('title', 'マイページ')

@section('content')

<div id="overlay" class="overlay"></div>
<div class="user_name">
  <h1>{{ $user->name . 'さん'}}</h1>
</div>
<div class="mypage_content_title">
  <div class="reservation-title">
    <h2 class="tit2">予約状況</h2>
  </div>
  <div class="likes_title">
    <h2 class="tit2">お気に入り店舗</h2>
  </div>
</div>

<div class="content">
  <div class="reservation">
    <?php $i = 1; ?>
    @foreach($reservations as $reservation)
    <!-- {{$start_at = $reservation->start_at}} -->
    <div class="resevation-detail " id="modal({{$loop->index}})">
      <div class="resevation_header">
        <div class="resevation_header_tit">
          <i class="fas fa-clock clock fa-2x"></i>
          <h2>予約{{$i}} <?php $i++; ?></h2>
        </div> <!-- resevation_header_tit -->
        <div class="tool">
          <div class="modal" data-target="{{$loop->index}}"><i class="fa fa-paperclip fa-lg"></i>
          </div>
          <form method="POST" action="{{ route('delete', ['resevation_id' => $reservation->id,]) }}" onsubmit="return confirm_test()">
            @csrf
            <input class="round_btn" type="submit" value="×">
          </form>
        </div>
      </div><!-- resevation_header -->
      <div class="section">
        <p class="section_name">Shop</p>
        <p class="section_detail">{{$reservation->shop->name}}</p>
      </div>
      <div class="section">
        <p class="section_name">Date</p>
        <p class="section_detail">{{date("Y/m/d",strtotime($start_at))}}</p>
      </div>
      <div class="section">
        <p class="section_name">Time</p>
        <p class="section_detail">{{date(" H:i",strtotime($start_at))}}</p>
      </div>
      <div class="section">
        <p class="section_name">Number</p>
        <p class="section_detail">{{$reservation->num_of_users.'人'}}</p>
      </div>
      <div id="modal{{$loop->index}}" class="resevation_change">
        <div class="resevation_change_tit">
          <h2><i class="fa fa-paperclip fa-lg" style="margin-right:10px;"></i>予約変更</h2>
          <div class="close" id="close">×閉じる</div>
        </div>
        <form action="/reservation_change" method="post">
          @csrf
          <!-- resevation_change -->
          <!-- {{$date = date("Y-m-d",strtotime($start_at))}} -->
          <!-- {{$time = date("H:i",strtotime($start_at))}} -->
          <!-- {{$num_of_users =  $reservation->num_of_users}} -->
          <input name="user_id" value="{{$user->id}}" type="hidden">
          <input name="id" value="{{$reservation->id}}" type="hidden">
          <input name="shop_id" value="{{$reservation->shop->id}}" type="hidden">
          <div>
            @error('date')
            <p style="color:red;">{{$message}}</p>
            @enderror
            <input type="date" name="date" class="change_date" value="{{ $date }}" id="date" class="reservation_input" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d", strtotime("+1 year")); ?>">
          </div>
          <div>
            @error('time')
            <p style="color:red;">{{$message}}</p>
            @enderror
            <select name="time" value="{{ $time }}" id="time" class="change_time">
              <option value="17:00" @if($time==="17:00" )selected @endif>17:00</option>
              <option value="17:30" @if($time==="17:30" )selected @endif>17:30</option>
              <option value="18:00" @if($time==="18:00" )selected @endif>18:00</option>
              <option value="18:30" @if($time==="18:30" )selected @endif>18:30</option>
              <option value="19:00" @if($time==="19:00" )selected @endif>19:00</option>
              <option value="19:30" @if($time==="19:30" )selected @endif>19:30</option>
              <option value="20:00" @if($time==="20:00" )selected @endif>20:00</option>
              <option value="20:30" @if($time==="20:30" )selected @endif>20:30</option>
              <option value="21:00" @if($time==="21:00" )selected @endif>21:00</option>
              <option value="21:30" @if($time==="21:30" )selected @endif>21:30</option>
            </select>
          </div>
          <div>
            @error('num_of_users')
            <p style="color:red;">{{$message}}</p>
            @enderror
            <select name="num_of_users" value="{{ $num_of_users }}" id="num_of_users" class="change_num_of_users">
              <option value="1" @if($num_of_users===1 ) selected @endif>1人</option>
              <option value="2" @if($num_of_users===2 ) selected @endif>2人</option>
              <option value="3" @if($num_of_users===3 ) selected @endif>3人</option>
              <option value="4" @if($num_of_users===4 ) selected @endif>4人</option>
              <option value="5" @if($num_of_users===5 ) selected @endif>5人</option>
              <option value="6" @if($num_of_users===6 ) selected @endif>6人</option>
              <option value="7" @if($num_of_users===7 ) selected @endif>7人</option>
              <option value="8" @if($num_of_users===8 ) selected @endif>8人</option>
              <option value="9" @if($num_of_users===9 ) selected @endif>9人</option>
              <option value="10" @if($num_of_users===10 ) selected @endif>10人</option>
            </select>
          </div>
          <div class="reservation_detail">
            <div class="reservation_detail_wrap">
              <div class="item_wrap">
                <p class="item">Shop</p>
                <p style="color:white;">{{$reservation->shop->name}}</p>
              </div>
              <div class="item_wrap">
                <p class="item">Date</p>
                <p style="color:white;" class="pDate"></p>
              </div>
              <div class="item_wrap">
                <p class="item">Time</p>
                <p style="color:white;" class="pTime"></p>
              </div>
              <div class="item_wrap">
                <p class="item">Number</p>
                <p style="color:white;" class="pNum"></p>
              </div>
            </div>
          </div>
          <label for="reservation"><input type="submit" value="変更する" class="reservation_btn" id="reservation" style="width:100%;"></label>
        </form>
      </div><!-- resevation-change -->
    </div><!-- resevation-detail -->
    @endforeach
    <script>
      $('.modal').on('click', function() {
        $(this).toggleClass('active');
        $('#overlay').fadeIn();
        $("#modal" + $(this).attr('data-target')).addClass('active');
        $("#modal" + $(this).attr('data-target')).fadeIn(500);
        $('#overlay,#close').click(function() {
          $('#overlay').fadeOut();
          $('.pDate').text("");
          $('.pTime').text("");
          $('.pNum').text("");
          $('.resevation_change').removeClass('active');
          $('.resevation_change').fadeOut(500);
        });
      });
    </script>
    <script>
      $('.change_date').change(function() {
        var date = $(this).val();
        $('.pDate').text(date);
      });
      $('.change_time').change(function() {
        var time = $(this).val();
        $('.pTime').text(time);
      });
      $('.change_num_of_users').change(function() {
        var change_num_of_users = $(this).val();
        $('.pNum').text(change_num_of_users + '人');
      });
    </script>
  </div><!-- reservation -->
  <div class="liked-shop">
    <div class="likes_title_second">
      <h2 class="tit2">お気に入り店舗</h2>
    </div>
    <div class="liked-shop-detail">
      @foreach ($items as $item)
      @foreach($item->likes as $obj)
      <div class="card">
        <div class="content-img"><img src="{{$obj->shop->image_url}}" /></div>
        <div class="text-box">
          <div>
            <h2 class="title">{{$obj->shop->name}}</h2>
            <p class="date">{{$obj->shop->getArea()}} {{$obj->shop->getGenre()}}</p>
          </div>
          <div class="card_item">
            <a class="btn" href="{{ route('detail', ['shop_id' =>  $obj->shop->id,]) }}">詳しく見る</a>
            <div class="heart icon"></div>
            <div class="likes">
              @if (!$obj->shop->isLikedBy(Auth::user()))
              <span class="likes">
                <i class="fas fa-heart like-toggle like-btn" data-shop-id="{{ $obj->shop->id }}" data-user-id="{{ $user->id }}"></i>
              </span><!-- /.likes -->
              @else
              <span class="likes">
                <i class="fas fa-heart like-toggle liked like-btn" data-shop-id="{{ $obj->shop->id }}" data-user-id="{{ $user->id }}"></i>
              </span><!-- /.likes -->
              @endif
            </div><!-- likes -->
          </div><!-- card-item -->
        </div><!-- text-box -->
      </div><!-- card -->
      @endforeach
      @endforeach
    </div><!-- <liked-shop-> -->
  </div>
</div><!-- <flex> -->

@endsection