<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Drinks extends Model
{
    //使用可能なテーブル
    protected $table = "test_products";

    // テーブルに関連付ける主キー
    protected $primaryKey = 'company_id';

    // 登録・更新可能なカラムの指定
    protected $fillable = [
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
        'created_at',
        'updated_at'
    ];

    /**
      * 一覧画面表示用にtest_productテーブルから全てのデータを取得
      */
      public function findAllDrinks() {
          return Drinks::all();
      }
 
      /**
       * 更新処理
       */
      public function updateDrink($request, $drink) {
          $result = $drink->fill([
              'product_name' => $request->product_name
          ])->save();
  
          return $result;
      }

      public function InsertDrink($request) {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'company_id' => $request->company_id,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'comment' => $request->comment,
        ]);
    }
}
