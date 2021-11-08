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



  .rate-form {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
  }

  .rate-form input[type=radio] {
    display: none;
  }

  .rate-form label {
    position: relative;
    color: #ccc;
    cursor: pointer;
    font-size: 25px;
  }

  .rate-form label:hover {
    color: #ffcc00;
  }

  .rate-form label:hover~label {
    color: #ffcc00;
  }

  .rate-form input[type=radio]:checked~label {
    color: #ffcc00;
  }

  .reviews {
    margin: 30px 0;
  }

  .reviews h2 {
    margin: 20px 0;
  }

  .review {
    border-top: 1px solid #CCCCCC;
    border-collapse: collapse;
    width: 48%;
  }

  .rate {
    align-items: center;
  }

  .rate p {
    margin-right: 20px;
    font-weight: 400;
    align-items: center;
  }

  .user_name {
    font-weight: 400;
    align-items: center;
  }

  .coment textarea {
    border: 1px solid #E6E6E6;
    background-color: #E6E6E6;
    width: 94%;
    font-size: 14px;
  }

  .user_review {
    border-top: 1px solid #CCCCCC;
    padding-top: 12px;
  }

  .star {
    color: #ffcc00;
    font-size: 25px;
  }

  .no_star {
    color: #ccc;
    font-size: 25px;
  }

  .review_toggle {
    margin-bottom: 10px;
    padding-bottom: 10px;
    cursor: pointer;

  }

  .review_change {
    margin-bottom: 20px;
  }

  .flexAlignCenter {
    display: flex;
    align-items: center;
  }

  .avg_reviews {
    width: 48%;
    justify-content: space-between;
  }

  .avg_reviews_content {
    margin-right: 10px;
  }

  .aveP {
    font-size: 20px;
    font-weight: bold;
  }

  .user_rate {
    margin-top: 10px;
  }

  .users_review_toggle {
    display: none;
  }

  .reservation_toggle {
    display: none;
    margin-bottom: 10px;
    border-bottom: 1px solid #CCCCCC;
    width: 94%;
  }

  @media screen and (max-width: 768px) {

    .reservation,
    .user_review {
      display: none;
    }

    .card {
      width: 100%;
    }

    .review,
    .avg_reviews {
      width: 94%;
    }

    .users_review_toggle {
      display: block;
    }

    .reservation_toggle {
      display: block;

    }

    .reservation {
      width: 100%;
      height: auto;
    }

    .wrap {
      display: block;
    }
  }

  @media screen and (min-width: 769px) {

    .reservation,
    .user_review {
      display: block;
    }

    .reservation,
    .card {
      width: 50%;
    }

    .wrap {
      display: flex;
    }
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
      <script>
        $(function() {
          $('.reservation_toggle').click(function() {
            $('.reservation').show();
          });
        });
        // $(function() {
        //   $('.reservation_toggle').click(function() {
        //     $('.reservation').toggle();
        //   });
        // });
      </script>
      <div class="reservation_toggle flexAlignCenter">
        <i class="fas fa-plus" style="margin: 5 5px;"></i>
        <p style="display:inline-block;cursor: pointer;">予約する</p>
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
            @endif
            <input name="shop_id" value="{{$shop->id}}" type="hidden">
            <div>
              @error('date')
              <p style="color:red;">{{$message}}</p>
              @enderror
              <input type="date" name="date" value="{{ old('date') }}" id="date" class="reservation_input" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d", strtotime("+1 year")); ?>">
            </div>
            <div>
              @error('time')
              <p style="color:red;">{{$message}}</p>
              @enderror
              <select name="time" id="time">
                <option value=""></option>
                <option value="17:00" @if(old('time')=='17:00' )selected @endif>17:00</option>
                <option value="17:30" @if(old('time')=='17:30' )selected @endif>17:30</option>
                <option value="18:00" @if(old('time')=='18:00' )selected @endif>18:00</option>
                <option value="18:30" @if(old('time')==="18:30" )selected @endif>18:30</option>
                <option value="19:00" @if(old('time')==="19:00" )selected @endif>19:00</option>
                <option value="19:30" @if(old('time')==="19:30" )selected @endif>19:30</option>
                <option value="20:00" @if(old('time')==="20:00" )selected @endif>20:00</option>
                <option value="20:30" @if(old('time')==="20:30" )selected @endif>20:30</option>
                <option value="21:00" @if(old('time')==="21:00" )selected @endif>21:00</option>
                <option value="21:30" @if(old('time')==="21:30" )selected @endif>21:30</option>
              </select>
            </div>
            <div>
              @error('num_of_users')
              <p style="color:red;">{{$message}}</p>
              @enderror
              <select name="num_of_users" id="num">
                <option value=""></option>
                <option value="1" @if(old('num_of_users')==1 ) selected @endif>1人</option>
                <option value="2" @if(old('num_of_users')==2 ) selected @endif>2人</option>
                <option value="3" @if(old('num_of_users')==3 ) selected @endif>3人</option>
                <option value="4" @if(old('num_of_users')===4 ) selected @endif>4人</option>
                <option value="5" @if(old('num_of_users')===5 ) selected @endif>5人</option>
                <option value="6" @if(old('num_of_users')===6 ) selected @endif>6人</option>
                <option value="7" @if(old('num_of_users')===7 ) selected @endif>7人</option>
                <option value="8" @if(old('num_of_users')===8 ) selected @endif>8人</option>
                <option value="9" @if(old('num_of_users')===9 ) selected @endif>9人</option>
                <option value="10" @if(old('num_of_users')===10 ) selected @endif>10人</option>
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
                <p style="color:white;" id="pDate">{{old('date')}}</p>
              </div>
              <div class="item_wrap">
                <p class="item">Time</p>
                <p style="color:white;" id="pTime">{{old('time')}}</p>
              </div>
              <div class="item_wrap">
                <p class="item">Number</p>
                <p style="color:white;" id="pNum">{{old('num_of_users')}}</p>
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
  <div class="avg_reviews flexAlignCenter">
    <h2>レビュー</h2>
    <div class="avg_reviews_content flexAlignCenter">
      <div class="count flexAlignCenter">
        <i class="fas fa-comment"></i>
        <p>{{$reviews->count()}}件</p>
      </div><!-- count_reviews -->
      <div class="ave flexAlignCenter">
        <!-- <p>{{$ave = $reviews->avg('rate')}}</p> -->
        <p class="star">★</p>
        <p class="aveP"><?php echo round($ave, 1) . "\n"; ?></p>
      </div><!-- avg -->
    </div><!-- avg_reviews -->
  </div><!-- avg_reviews_content  -->
  <script>
    $(function() {
      $('.users_review_toggle').click(function() {
        $('.user_review').show();
      });
    });
  </script>
  <div class="users_review_toggle flexAlignCenter">
    <i class="fas fa-plus" style="margin: 5 5px;"></i>
    <p style="display:inline-block;cursor: pointer;">レビューを見る</p>
  </div>
  <div class="review">
    @if ($reservation !==null)　
    <?php $today = date("Y-m-d H:i:s", strtotime("+1 hours")); ?>
    <!-- {{$start_at = $reservation->start_at}} -->
    @endif
    <script>
      $(function() {
        $('.review_toggle').click(function() {
          $('.review_change').toggle();
        });
      });
    </script>
    @if ($reservation !==null && $user_review !==null)
    <!-- {{$updated_at = $user_review->updated_at}} -->
    <p style="margin-bottom:10px;">{{date("Y/m/d",strtotime($updated_at))}}にレビュー済み</p>
    <p class="review_toggle ">レビューを変更する</p>
    <div class="review_change" style="display:none;">
      <!-- {{$rate = $user_review->rate }} -->
      <form method="post" action="/review_change">
        @csrf
        <div class="user_name ">
          <p>{{$user->name}}</p>
        </div>
        <div class="rate">
          <input name="id" value="{{$user_review->id}}" type="hidden">
          <input name="user_id" value="{{$user->id}}" type="hidden">
          <input name="shop_id" value="{{$shop->id}}" type="hidden">
          <p style="align-items: center;">評価</p>
          <div class="rate-form">
            <input id="star5" type="radio" name="rate" value="5" @if($rate===5 ) checked @endif>
            <label for="star5">★</label>
            <input id="star4" type="radio" name="rate" value="4" @if($rate===4 ) checked @endif>
            <label for="star4">★</label>
            <input id="star3" type="radio" name="rate" value="3" @if($rate===3 ) checked @endif>
            <label for="star3">★</label>
            <input id="star2" type="radio" name="rate" value="2" @if($rate===2 ) checked @endif>
            <label for="star2">★</label>
            <input id="star1" type="radio" name="rate" value="1" @if($rate===1 ) checked @endif>
            <label for="star1">★</label>
          </div><!-- rate-form -->
        </div><!-- rate -->
        <div class="coment">
          @error('coment')
          <p style="color:red;">{{$message}}</p>
          @enderror
          <textarea name="coment" rows="4" cols="100">{{$user_review->coment}} </textarea>
        </div>
        <input type="submit" value="変更">
      </form>
      <!--action="/review_change" -->
    </div>
    @elseif ($reservation !==null && $start_at<$today) <form method="post" action="/review">
      @csrf
      <div class="user_name ">
        <p>{{$user->name}}</p>{{$user_review}}
      </div>
      <div class="rate">
        <input name=" user_id" value="{{$user->id}}" type="hidden">
        <input name="shop_id" value="{{$shop->id}}" type="hidden">
        <div class="user_rate">@error('rate')
          <p style="color:red;">{{$message}}</p>
          @enderror
          <p　style="margin: top 5px; display:block;">評価</p>
        </div>

        <div class="rate-form">
          <input id="star5" type="radio" name="rate" value="5" @if(old("rate")==5 )checked @endif>
          <label for="star5">★</label>
          <input id="star4" type="radio" name="rate" value="4" @if(old("rate")==4 )checked @endif>
          <label for="star4">★</label>
          <input id="star3" type="radio" name="rate" value="3" @if(old("rate")==3 )checked @endif>
          <label for="star3">★</label>
          <input id="star2" type="radio" name="rate" value="2" @if(old("rate")==2 )checked @endif>
          <label for="star2">★</label>
          <input id="star1" type="radio" name="rate" value="1" @if(old("rate")==1 )checked @endif>
          <label for="star1">★</label>
        </div style="aligin-item:center;"><!-- rate-form -->
      </div><!-- rate -->
      <div class="coment">
        @error('coment')
        <p style="color:red;">{{$message}}</p>
        @enderror
        <textarea name="coment" rows="4" cols="100" placeholder="レビューを入力する">{{ old('coment') }}</textarea>
      </div>
      <input type="submit" value="レビュー">
      </form>
      <!--action="/review" -->
      @endif
      @foreach( $reviews as $review)
      <div class="user_review">
        <p style="margin-bottom:10px;">{{$review->user->name}}</p>
        <p style="margin-bottom:10px;">{{date("Y/m/d",strtotime($updated_at))}}にレビュー済み</p>
        <div class="rate-form" style="margin-bottom:10px;">
          @if($review->rate === 1)
          <p class="no_star">★★★★</p>
          <p class="star">★</p>
          @elseif($review->rate === 2)
          <p class="no_star">★★★</p>
          <p class="star">★★</p>
          @elseif($review->rate === 3)
          <p class="no_star">★★</p>
          <p class="star">★★★</p>
          @elseif($review->rate === 4)
          <p class="no_star">★</p>
          <p class="star">★★★★</p>
          @elseif($review->rate === 5)
          <p class="no_star"></p>
          <p class="star">★★★★★</p>
          @endif
        </div><!-- rate-form -->
        <p style="margin-bottom:20px;">{{$review->coment}}</p>
      </div>
      <!--user_review" -->


      @endforeach


  </div><!-- review -->
</div><!-- reviews -->
<!-- content -->



@endsection