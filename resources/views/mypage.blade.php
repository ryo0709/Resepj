@extends('layouts.default')
<link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
<style>
  img {
    width: 100%;
  }

  .card {
    width: 45%;
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
  }

  .btn_wrap {
    text-align: right;
  }

  .card_item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 90%;
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
    text-align: left;
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
  }

  .clock {
    color: white;
  }

  .resevation_header {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .resevation_header_tit {
    display: flex;
    align-items: center;
    padding-left: 40px;
  }

  .resevation_header_tit h2 {
    padding-left: 40px;
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
    margin-right: 40px;
  }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
  $(function() {
    let like = $('.like-toggle'); //like-toggleのついたiタグを取得し代入。
    let likeShopId; //変数を宣言（なんでここで？）
    let likeUserId; //変数を宣言（なんでここで？）
    like.on('click', function() { //onはイベントハンドラー
      let $this = $(this); //this=イベントの発火した要素＝iタグを代入
      likeShopId = $this.data('shop-id'); //iタグに仕込んだdata-review-idの値を取得
      likeUserId = $this.data('user-id'); //iタグに仕込んだdata-review-idの値を取得
      //ajax処理スタート
      $.ajax({
          headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }, //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
          url: '/liked', //通信先アドレスで、このURLをあとでルートで設定します
          method: 'get', //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
          data: { //サーバーに送信するデータ
            'shop_id': likeShopId,
            'user_id': likeUserId //いいねされた投稿のidを送る
          },
        })
        //通信成功した時の処理
        .done(function(data) {
          $this.toggleClass('liked'); //likedクラスのON/OFF切り替え。
          $this.next('.like-counter').html(data.review_likes_count);
        })
        //通信失敗した時の処理
        .fail(function() {
          console.log('fail');
        });
    });
  });
</script>
@section('title', 'マイページ')

@section('content')
<div class="content">
  <div class="reservation">
    <h2 class="tit2">予約状況</h2>
    <?php $i = 1; ?>
    @foreach ($items as $item)
    @foreach($item->reservations as $obj)
    <div class="resevation-detail">
      <div class="resevation_header">
        <div class="resevation_header_tit">
          <i class="fas fa-clock clock fa-2x"></i>
          <h2>予約{{$i}} <?php $i++; ?></h2>
        </div>
        <script>
          function confirm_test() {
            var select = confirm("ご予約を削除してよろしいですか？");
            return select;
          }
        </script>
        <form method="POST" action="{{ route('delete', ['resevation_id' => $obj->id,]) }}" onsubmit="return confirm_test()">
          @csrf
          <input class="round_btn" type="submit" value="×">
        </form>
      </div>
      <div class="section">
        <p class="section_name">Shop</p>
        <p class="section_detail">{{$obj->shop->name}}</p>
      </div>
      <div class="section">
        <!-- {{$datetime = $obj->start_at}} -->
        <p class="section_name">Date</p>
        <p class="section_detail">{{date("Y/m/d",strtotime($datetime))}}</p>
      </div>
      <div class="section">
        <p class="section_name">Time</p>
        <p class="section_detail">{{date(" H:i",strtotime($datetime))}}</p>
      </div>
      <div class="section">
        <p class="section_name">Number</p>
        <p class="section_detail">{{$obj->num_of_users.'人'}}</p>
      </div>
    </div><!-- resevation-detail -->
    @endforeach
    @endforeach
  </div><!-- reservation -->
  <div class="liked-shop">
    <div class="user_name">
      <h1>{{ $user->name . 'さん'}}</h1>
    </div>
    <h2 class="tit">お気に入り店舗</h2>
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
            <button class="btn"><a href="{{ route('detail', ['shop_id' =>  $obj->shop->id,]) }}" style="color:white;">詳しく見る</a></button>
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