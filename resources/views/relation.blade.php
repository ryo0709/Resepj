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
</style>
@section('title', 'book.index.blade.php')

@section('content')
<table>
  <tr>
    <th>Books</th>
  </tr>
  @foreach ($items as $item)
  <tr>
    <td>
      {{$item->area}}
    </td>
    <td>
      {{$item->category}}
    </td>
    <td>
      @if ($item->shop != null)
      <table width="100%">
        @foreach ($item->shops as $obj)
        <tr>
          <td>{{ $obj->getShop() }}</td>
        </tr>
        @endforeach
      </table>
      @endif
    </td>
     

  </tr>
  @endforeach
</table>
@endsection