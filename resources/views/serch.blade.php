@extends('layouts.test')

@section('title','検索結果')

@section('content')
<h1>検索結果</h1>
@if (isset($drinks))
<table>
    <tr>
        <th>商品名</th><th>価格</th><th>在庫</th>
    </tr>
    @foreach ($drinks as $drink)
    <tr>
        <td>{{$drink->product_name}}</td><td>{{$drink->price}}</td><td>{{$drink->stock}}</td>
    </tr>
    @endforeach
</table>
@endif
@if(!empty($message))
<div class="alert alert-primary" role="alert">{{ config('const.message')}}</div>
@endif
<button onclick="location.href='{{url('/index')}}'">戻る</button>
@endsection