@extends('layouts.test')

@section('content')
<h1>商品情報登録画面</h1>
<div>
    <form action="{{route('store')}}" method="post">
        @csrf
        <div>
            <label>商品ID</label>
            <input type="text" name="company_id" value="{{ old('company_id') }}">
            @if($errors->has('company_id'))
                <p>{{ $errors->first('company_id') }}</p>
            @endif
        </div>
        <br>
        <div>
            <label>商品名</label>
            <input type="text" name="product_name" value="{{ old('product_name') }}">
            @if($errors->has('product_name'))
                <p>{{ $errors->first('product_name') }}</p>
            @endif
        </div>
        <br>
        <div>
            <label>価格</label>
            <input type="text" name="price" value="{{ old('price') }}">
            @if($errors->has('price'))
                <p>{{ $errors->first('price') }}</p>
            @endif
        </div>
        <div>
            <label>在庫</label>
            <input type="text" name="stock" value="{{ old('stock') }}">
            @if($errors->has('stock'))
                <p>{{ $errors->first('stock') }}</p>
            @endif
        </div>
        <div>
            <label>コメント</label>
            <input type="text" name="comment" value="{{ old('comment') }}">
            @if($errors->has('comment'))
                <p>{{ $errors->first('comment') }}</p>
            @endif
        </div>
        <div>
            <button type="submit">登録</button>
        </div>
    </form>
</div>
<button onclick="location.href='{{url('/index')}}'">戻る</button>
@endsection
