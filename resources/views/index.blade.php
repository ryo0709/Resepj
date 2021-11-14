@extends('layouts.default2')
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
  }

  .card {
    width: 20%;
    margin-right: 10px;
    margin-bottom: 10px;
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
    padding-top: 100px;
  }

  .btn {
    background-color: blue;
    color: white;
    border-radius: 5px;
    margin-top: 5px;
    font-weight: 400;
    padding: 4px 8px;
  }

  @media screen and (max-width: 1000px) {
    .btn {
      font-size: 12px;
      padding: 4px 6px;
    }

  }

  @media screen and (max-width: 768px) {


    .title {
      font-size: 16px;
    }

    .text-box {
      padding: 15px;
      background-color: white;
    }


  }

  @media screen and (max-width: 785px) {
    .card {
      width: 40%;
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

  .no_heart {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 360px;
    padding: 30px 40px;
    background-color: #E6E6E6;
    border-radius: 5px;
    z-index: 11;
  }

  .no_heart p {
    margin-bottom: 30px;
    text-align: center;
    font-weight: 600;
  }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  //お気に入り登録・削除機能
  $(function() {
    let like = $('.like-toggle'); //変数likeにハートをクリックしたshopのlike-toggleを代入（.はクラスを意味）
    like.on('click', function() { //ハートアイコンをクリックしたら以下の処理がされる
      let $this = $(this); //$thisはハートをクリックをしたshop
      let likeShopId = $this.data('shop-id'); //変数likeShopIdにbladeでセットしたdata()からshop-idを取り出し代入
      let likeUserId = $this.data('user-id'); //変数UserIdにbladeでセットしたdata()からuser-idを取り出し代入
      $.ajax({ //ajax通信開始
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: '/liked', //　/likedにアクセス
          method: 'get', //　設定しているメソッド
          data: { //下記でshop_idとuser_idを持たせる
            'shop_id': likeShopId,
            'user_id': likeUserId
          },
        })
        .done(function(data) { //処理が成功したらtoggleClass()でクラスの付加又は除去
          $this.toggleClass('liked'); //likedクラスが付加されていなければ赤されていれば灰色になる仕組み
        })
        .fail(function() {
          console.log('fail'); //処理ができない場合failログ
        });
    });
  });
</script>
@section('title')
@if (Auth::check())
@section('content')

<div class="wrap">

  @if (@isset($shops))
  @foreach ($shops as $shop)
  <div class="card area_id{{$shop->area_id}} genre_id{{$shop->genre_id}}" id="card">
    <div class="content-img">
      <img src="{{$shop->image_url}}" />
    </div>
    <div class="text-box">
      <div>
        <h2 class="title">
          {{$shop->name}}
        </h2>
        <p class="date">{{$shop->getArea()}} {{$shop->getGenre()}}</p>
      </div>
      <div class="card_item">
        <a class="btn" href="{{route('detail', ['shop_id' => $shop->id,]) }}" style="color:white;">詳しく見る</a>
        <div class="heart icon"></div>
        <div class="like">
          @if (!$shop->isLikedBy(Auth::user()))
          <span class="likes">
            <i class="fas fa-heart like-toggle like-btn" data-shop-id="{{ $shop->id }}" data-user-id="{{ $user->id }}"></i>
          </span><!-- /.likes -->
          @else
          <span class="likes">
            <i class="fas fa-heart like-toggle liked like-btn" data-shop-id="{{ $shop->id }}" data-user-id="{{ $user->id }}"></i>
          </span><!-- /.likes -->
          @endif
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @endif
</div>
@else
<div class="wrap">
  @if (@isset($shops))
  @foreach ($shops as $shop)
  <div class="card area_id{{$shop->area_id}} genre_id{{$shop->genre_id}}" id="card">
    <div class="content-img">
      <img src="{{$shop->image_url}}" />
    </div>
    <div class="text-box">
      <div>
        <h2 class="title">
          {{$shop->name}}
        </h2>
        <p class="date">{{$shop->getArea()}} {{$shop->getGenre()}}</p>
      </div>
      <div class="card_item">
        <a class="btn" href="{{ route('detail', ['shop_id' => $shop->id,]) }}" style="color:white;">詳しく見る</a>
        <div class="heart icon"></div>
        <div class="like">
          <span class="likes">
            <i class="fas fa-heart like-btn heart-btn"></i>
          </span><!-- /.likes -->
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @endif
</div>
@endif
<div id="overlay" class="overlay"></div>
<div class="no_heart" style="display:none;">
  <p>お気に入り登録するにはログインをして下さい。</p>
  <p><a href="/login">（ログイン</a>｜
    <a href="/register">登録</a>）
  </p>
</div>
<script>
  //モーダルウインドウ　ログインしていないユーザーがハートアイコン(お気に入り登録)をクリックした場合に表示
  $('.heart-btn').on('click', function() {//ハートアイコンをクリックしたら以下の処理がされる
    $(this).toggleClass('active');
    $('#overlay').fadeIn();//オーバーレイが表示
    $(".no_heart").addClass('active');//ログイン又は登録が必要であるテキストが表示
    $(".no_heart").fadeIn(500);
    $('#overlay').click(function() {//テキスト以外をクリックしたらテキスト・オーバーレイが消えます。＊登録を促すため閉じるボタンはなし
      $('#overlay').fadeOut();
      $('.no_heart').removeClass('active');
      $('.no_heart').fadeOut(500);
    });
  });
</script>
@endsection