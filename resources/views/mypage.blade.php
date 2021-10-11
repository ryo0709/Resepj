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

  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }
</style>
@section('title', 'index.blade.php')

@section('content')
@if (Auth::check())
<p>{{$user->name . ' さん'}}</p>
@else
<p>ログインしていません。（<a href="/login">ログイン</a>｜
  <a href="/register">登録</a>）
</p>
@endif

<table>
  <tr>
    <th>Data</th>
  </tr>
  <tr>
    <td>
      {{ $user->name }}
    </td>
  </tr>
  <tr>

    @foreach ($items as $item)
  <tr>
    <td>
      <h2>予約状況</h2>
      @foreach($item->reserves as $obj)
      <ul>
        <input type="submit" value="削除">
        <li>Shop{{$obj->getShopName()}}</li>
        <li>Date{{$obj->reservation_date }}</li>
        <li>Time{{$obj->reservation_time}}</li>
        <li>Number{{$obj->number}}</li>
      </ul>
      @endforeach
    </td>
  </tr>
  @endforeach
</table>
@endsection