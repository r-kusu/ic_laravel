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

    //日用品登録処理
    public function create(Request $request){
        $request->validate([
            
            'name'=>['required'],
        
        ]);

        $category = Category::create([
            
            'id' =>$request->input('id'),
            'name'=>$request->input('name'),
        ]);
    }

    
}