@extends('layouts.test')

@section('title','編集画面')

@section('content')
<h1>編集画面</h1>
<form action="{{route('update',['id'=>$drink->company_id]) }}" method="POST">
    @csrf
    <div>
        <label>商品名の編集</label>
        <input type="text" name="product_name" id="product_name">
    </div>
    <div>
        <button type="submit">編集</button>
    </div>
    <div>
        <a href="{{route('top')}}">一覧画面</a>
    </div>
</form>
@endsection