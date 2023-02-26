@extends('layouts.test')

@section('content')
<h1>商品情報登録画面</h1>
<div>
    <form action="{{route('store')}}" method="post">
        @csrf
        <div>
            <label>商品ID</label>
            <input type="text" name="company_id">
        </div>
        <br>
        <div>
            <label>商品名</label>
            <input type="text" name="product_name">
        </div>
        <br>
        <div>
            <label>価格</label>
            <input type="text" name="price">
        </div>
        <div>
            <label>在庫</label>
            <input type="text" name="stock">
        </div>
        <div>
            <label>コメント</label>
            <input type="text" name="comment">
        </div>
        <div>
            <button type="submit">登録</button>
        </div>
    </form>
</div>
<button onclick="location.href='{{url('/index')}}'">戻る</button>
@endsection
