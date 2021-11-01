@extends('layouts.default2')

<style>
  .button-open {
    display: block;
    margin: 0 auto;
    width: 20rem;
    padding: 1em;
    background-color: #3140c9;
    color: #eaeaea;
    border-radius: 20rem;
    cursor: pointer;
  }

  /* モーダルウィンドウ */
  .modal-window {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
    height: 300px;
    background-color: #dfdddd;
    border-radius: 5px;
    z-index: 11;
    padding: 2rem;
  }

  /* 閉じるボタン */
  .button-close {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 200px;
    padding: 1em;
    background-color: #c96931;
    color: #eaeaea;
    border-radius: 20rem;
    cursor: pointer;
  }

  /* オーバーレイ */
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
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(function() {
    $('.js-open').click(function() {
      $('#overlay, .modal-window').fadeIn();
    });
    $('.js-close , #overlay').click(function() {
      $('#overlay, .modal-window').fadeOut();
    });
  });
</script>

@section('content')
<button class="js-open button-open">open</button>

<div class="modal-window">
  <button class="js-close button-close">Close</button>
</div>

@endsection


<div class=" update_dateil" style="display:none;">
  <!-- var index = {{$loop->index}} -->
  <input name="user_id" value="{{$user->id}}" type="hidden">
  <input name="shop_id" value="{{$obj->shop->id}}" type="hidden">
  <div>
    @error('date')
    <p style="color:red;">{{$message}}</p>
    @enderror
    <!-- {{$datetime = $obj->start_at}} -->
    <!-- {{$date = date("Y-m-d",strtotime($datetime))}} -->
    <input type="date" name="date" value="{{$date}}" id="date" class="reservation_input" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d", strtotime("+1 year")); ?>">
  </div>
  <div>
    <div class="update_close">やめる</div>
    @error('time')
    <p style="color:red;">{{$message}}</p>
    @enderror
    <!-- {{$time = date("H:i",strtotime($datetime))}} -->
    <select name="time" value="{{ $time }}" id="time">
      <option value=""></option>
      <option value="17:00" @if($time==="17:00" )selected @endif>17:00</option>
      <option value="17:30" @if($time==="17:30" )selected @endif>17:30</option>
      <option value="18:00" @if($time==="18:00" )selected @endif>18:00</option>
    </select>
  </div>
  <div>
    @error('num')
    <p style="color:red;">{{$message}}</p>
    @enderror
    <!-- {{$num =  $obj->num_of_users}} -->
    <select name="num" id="num">
      <option value=""></option>
      <option value="1" @if($num===1 ) selected @endif>1人</option>
      <option value="2" @if($num===2 ) selected @endif>2人</option>
      <option value="3" @if($num===3 ) selected @endif>3人</option>
    </select>
  </div>
  <div class="item_wrap">
    <p class="item">Shop</p>
    <p style="color:white;">{{$obj->shop->name}}</p>
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
    <p style="color:white;" id="pNum">'人'</p>
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

</div><!-- resevation_update -->



<div><button class="js-open button-open">open</button></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  // $(function() {
  //   $('.update-toggle').click(function() {
  //     var btnIndex = $(this).index();
  //     eq(btnIndex).toggleClass('active');

  //     if ($(this).hasClass('active')) {
  //       $('.update_dateil').addClass('active');
  //       $('.update_dateil').fadeIn(500);
  //     } else {}
  //   });
  //   $('.update_close').click(function() {
  //     $('.update_dateil').removeClass('active');
  //     $('.update_dateil').fadeOut(1000);
  //     $('.update-toggle').removeClass('active');
  //   });
  // });
  $('.js-open').on('click', function() {
    var index = $('.resevation-detail').index();
    alert(index);
  });
</script>