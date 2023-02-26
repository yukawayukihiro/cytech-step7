@extends('layouts.test')

@section('title','商品情報詳細画面')

@section('content')
<h1>商品情報詳細画面</h1>
<table>
    <tr>
        <th>商品ID</th><th>商品名</th><th>価格</th><th>在庫</th><th>コメント</th>
    </tr>
    @foreach($drinks as $drink)
    <tr>
        <td>{{$drink->company_id}}</td><td>{{$drink->product_name}}</td><td>{{$drink->price}}</td><td>{{$drink->stock}}</td><td>{{$drink->comment}}</td>
    </tr>
    @endforeach
</table>
<button onclick="location.href='{{url('/top')}}'">編集</button>
<button onclick="location.href='{{url('/index')}}'">戻る</button>
@endsection