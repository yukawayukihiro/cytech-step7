<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//検索結果画面へリダイレクト
Route::get('/serch','DrinksController@serch')->name('serch');
//商品情報一覧画面へアクセス
Route::get('/index','DrinksController@index')->name('index');
//削除
Route::post('/destroy/{id}', 'DrinksController@destroy')->name('destroy');

//編集画面トップへアクセス
Route::get('/top','DrinksController@top')->name('top');
//編集画面へアクセス
Route::get('/edit/{id}','DrinksController@edit')->name('edit');
//更新
Route::post('/update/{id}','DrinksController@update')->name('update');

//商品情報詳細画面へアクセス
Route::get('/detail','DrinksController@detail')->name('detail');

//登録画面
Route::get('/create','DrinksController@create')->name('create');
//登録処理
Route::post('/store','DrinksController@store')->name('store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
