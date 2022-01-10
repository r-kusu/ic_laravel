<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use Validator;

class DailyController extends Controller
{
    //日用品登録画面の表示
    public function index(){
        return view('register.daily');
    }
    

    //日用品登録処理

    public function create(Request $request)
    {
        $request->validate([
            'name'=>['required'],
            'stock'=>['required','integer','min:0'],
            'threshold'=>['required','integer','min:0'], 
            'place'=>['required'],   
]);

            $item = Item::create([
                // TODO: ログイン情報からユーザーID取得
                'user_id' => '1',
                'name'=>$request->input('name'),
                'image_name'=>$request->input('image_name'),
                'stock'=>$request->input('stock'),
                'threshold'=>$request->input('threshold'),
                'place'=>$request->input('place')
            ]);
        

            $category= Category::create([
                'name'=>$request->input('category_name'),
                'item_id'=>$item->id
            ]);

            
        
        return redirect('/daily');
        
    }
}

