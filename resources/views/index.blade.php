@extends('layouts.test')

@section('title','商品情報一覧画面')

@section('content')
<h1>商品情報検索フォーム</h1>
<form action="{{url('/serch')}}" method="post">
    {{ csrf_field()}}
    {{method_field('get')}}
    <input type="text" name="product_name">
    <button type="submit">検索</button>
</form>
<h1>商品情報一覧画面</h1>
<table>
    <tr>
        <th>商品ID</th><th>商品名</th><th>価格</th><th>在庫</th><th>コメント</th><th>削除</th>
    </tr>
    @foreach ($drinks as $drink)
    <tr>
        <td>{{$drink->company_id}}</td><td>{{$drink->product_name}}</td><td>{{$drink->price}}</td>
        <td>{{$drink->stock}}</td><td>{{$drink->comment}}</td>
        <td>
        <form action="/destroy/{{$drink->id}}" method="POST">
            {{csrf_field()}}
            <button type="submit" id="btn">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
</table>
<button onclick="location.href='{{url('/create')}}'">新規登録</button>
<button onclick="location.href='{{url('/detail')}}'">詳細</button>
@endsection