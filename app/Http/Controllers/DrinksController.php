<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drinks;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;

class DrinksController extends Controller
{
    public function __construct() {
        $this->drink = new Drinks();
    }

    //商品情報詳細画面でデータを表示するメソッド
    public function detail () {
        $drinks = Drinks::all();
        return view('detail')->with('drinks',$drinks);
    }

    //商品情報一覧画面へデータを表示するメソッド
    public function index () {
        $drinks = Drinks::all();
        return view('index')->with('drinks',$drinks);
    }

    //検索フォームから検索を行うメソッド
    public function serch (Request $request) {
        $keyword_product_name = $request->product_name;
        $keyword_price = $request->price;
        $keyword_stock = $request->stock;

        if (!empty($keyword_product_name) && empty($keyword_price) && empty($keyword_stock) ) {
            $query = Drinks::query();
            $drinks = $query->where('product_name','like','%' .$keyword_product_name. '%')->get();
            $message = "「". $keyword_product_name."」を含む名前の検索が完了しました。";
            return view('/serch')->with([
                'drinks'=>$drinks,
                'message'=>$message,
            ]);
        }else {
            $message = "検索結果はありません。";
            return view('/serch')->with('message',$message);
            }
    }

    //削除機能
    public function destroy($id) {
            Drinks::where('id', $id)->delete();
            return redirect('/index')->with('success', '削除しました');
        }

    

    //編集のトップ画面メソッド
    public function top () {
        $drinks = Drinks::all();
        return view('top')->with('drinks',$drinks);
    }

    //編集画面の表示
    public function edit($id) {
        $drink = Drinks::find($id);

        return view('edit', compact('drink'));
    }

    //更新処理メソッド
    //更新処理
    public function update(Request $request, $id) {
        $drink = Drinks::find($id);
        $updateDrink = $this->drink->updateDrink($request, $drink);

        return redirect()->route('top');
    }

    /**
     * 登録画面
     */
    public function create(Request $request) {        
        return view('create');
    }

    /**
     * 登録処理
     */
    public function store(Request $request) {
        $registerDrink = $this->drink->InsertDrink($request);
        return redirect()->route('index');
    }
}
