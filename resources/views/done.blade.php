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
    width: 300px;
    margin: 100px auto;
    background-color: white;
    padding: 50px 0;
    border: solid 1px #BBBBBB;
    border-radius: 5px;
    box-shadow: 1px 1px 1px #BBB;
  }
</style>


@section('content')
<div class="section">
  <p>ご予約ありがとうございます。</p>
  <div class="btn_wrap">
    <a class="btn" href="/mypage">戻る</a>
  </div>
</div>
@endsection



<script>
  $('#area').change(function() {
    var area_id = $('#area').val();
    $.ajax({
        url: '/area_search',
        method: 'get',
        async: true,
        data: {
          'area_id': area_id,
        },
      })
      .done(function(json) {
        $('body').empty();
        $('body').append(json)
      }).fail(function(json) {
        alert('ajax失敗');
      });
  });
  $('#genre').change(function() {
    var genre_id = $('#genre').val();

    if (genre_id !== 0) {
      for (var i = 0; i <= 5; i++) {
        var hide_genre = '.' + 'genre_id' + i;
        var show_genre = '.' + 'genre_id' + genre_id;
        alert(hide_genre);
        $(hide_genre).hide();
        if (i == genre_id) {
          continue;
        }
      }
      $(show_genre).show();
    }

  });