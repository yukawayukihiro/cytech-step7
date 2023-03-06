<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;

class DrinksController extends Controller
{
    public function __construct() {
        $this->drink = new Products();
    }

    //商品情報詳細画面でデータを表示するメソッド
    public function detail () {
        $drinks = Products::all();
        return view('detail')->with('drinks',$drinks);
    }

    //商品情報一覧画面へデータを表示するメソッド
    public function index () {
        $drinks = Products::all();
        return view('index')->with('drinks',$drinks);
    }

    //検索フォームから検索を行うメソッド
    public function serch (Request $request) {
        $keyword_product_name = $request->product_name;
        $keyword_price = $request->price;
        $keyword_stock = $request->stock;

        if (!empty($keyword_product_name) && empty($keyword_price) && empty($keyword_stock) ) {
            $query = Products::query();
            $drinks = $query->where('product_name','like','%' .$keyword_product_name. '%')->get();
            $message = "「". $keyword_product_name."」を含む名前の検索が完了しました。";
            return view('/serch')->with([
                'drinks'=>$drinks,
                'message'=>$message,
            ]);
        }else {
            $message = config('const.message');
            return view('/serch')->with('message',$message);
            }
    }

    //削除機能
    public function destroy($id) {
        DB::beginTransaction();
        try {
            Products::where('id', $id)->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
            return redirect('/index');
        }

    //編集のトップ画面メソッド
    public function top () {
        $drinks = Products::all();
        return view('top')->with('drinks',$drinks);
    }

    //編集画面の表示
    public function edit($id) {
        $drink = Products::find($id);
        return view('edit', compact('drink'));
    }

    //更新処理
    public function update(Request $request, $id) {
        $drink = Products::find($id);
        DB::beginTransaction();
        try {
            $updateDrink = $this->drink->updateDrink($request, $drink);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
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
        DB::beginTransaction();
        try {
            $registerDrink = $this->drink->InsertDrink($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect()->route('index');
    }
}
