@extends('layouts.test')

@section('title','編集画面')

@section('content')
<h1>商品情報編集画面</h1>
<table>
    <tr>
        <th>商品ID</th><th>商品名</th><th>価格</th><th>在庫</th><th>コメント</th><th>編集</th>
    </tr>
    @foreach($drinks as $drink)
    <tr>
        <td>{{$drink->company_id}}</td><td>{{$drink->product_name}}</td><td>{{$drink->price}}</td><td>{{$drink->stock}}</td><td>{{$drink->comment}}</td>
        <td><a href="{{route('edit',['id'=>$drink->company_id]) }}">編集</a></td>
    </tr>
    @endforeach
</table>
<button onclick="location.href='{{url('/detail')}}'">戻る</button>
@endsection