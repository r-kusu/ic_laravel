<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //カテゴリー登録画面の表示
    public function index(){
    return view('register.category');
    }

    //カテゴリー名登録処理
    public function create(Request $request){
        $request->validate([
            
            'name'=>['required'],
        
        ]);
        
        $existed_category = Category::where("name", "=", $request->input('name'))->first();
        $category_id = "";


        if ( $existed_category != null ) {
            $id = $existed_category->id;
        } else {
            $category = Category::create([
            
                'id' =>$request->input('id'),
                'name'=>$request->input('name'),
            ]);
        }
    }

    
}