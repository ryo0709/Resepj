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
    cursor: pointer;
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
@section('title',)

@if (Auth::check())


@section('content')

<div class="wrap">
  @if (@isset($items))
  @foreach ($items as $item)
  <div class="card">
    <div class="content-img">
      <img src="{{$item->image_url}}" />
    </div>
    <div class="text-box">
      <div>
        <h2 class="title">
          {{$item->name}}
        </h2>
        <p class="date">{{$item->getArea()}} {{$item->getGenre()}}</p>
      </div>
      <div class="card_item">
        <button class="btn"><a href="{{route('detail', ['shop_id' => $item->id,]) }}" style="color:white;">詳しく見る</a></button>
        <div class="heart icon"></div>


        <div class="like">
          @if (!$item->isLikedBy(Auth::user()))
          <span class="likes">
            <i class="fas fa-heart like-toggle like-btn" data-shop-id="{{ $item->id }}" data-user-id="{{ $user->id }}"></i>
          </span><!-- /.likes -->
          @else
          <span class="likes">
            <i class="fas fa-heart like-toggle liked like-btn" data-shop-id="{{ $item->id }}" data-user-id="{{ $user->id }}"></i>
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
  @if (@isset($items))
  @foreach ($items as $item)
  <div class="card">
    <div class="content-img">
      <img src="{{$item->image_url}}" />
    </div>
    <div class="text-box">
      <div>
        <h2 class="title">
          {{$item->name}}
        </h2>
        <p class="date">{{$item->getArea()}} {{$item->getGenre()}}</p>
      </div>
      <div class="card_item">
        <button class="btn"><a href="{{ route('detail', ['shop_id' => $item->id,]) }}" style="color:white;">詳しく見る</a></button>
        <div class="heart icon"></div>


        <div class="like">
          <button type="submit"><i class="fas fa-heart like-btn"></i></button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @endif
</div>



@endif


@endsection