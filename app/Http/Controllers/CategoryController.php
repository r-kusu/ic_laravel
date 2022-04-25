<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Item;
use App\Models\Tags;
use App\Models\ItemTags;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //カテゴリー登録画面の表示
    public function index(Request $request){
        if(Auth::check()){
            // ログイン済みの時の処理
            $items = $request->user()->items()->get();
            $categories =  Category::get();
            $tags = Tags::all();
            $title = 'カテゴリ登録';

            return view('register.category',compact('items','categories','tags','title'));
        }
    //ログインしていないときの処理
    return redirect('login');
    }

    //カテゴリー登録処理
    public function create(Request $request){
        $request->validate([
            
            'name'=>['required'],
        
        ]);

        $category = Category::create([
            
            'id' =>$request->input('id'),
            'name'=>$request->input('name'),
        ]);

        $items = $request->user()->items()->get();
            $categories =  Category::get();
            $tags = Tags::all();
            $title = 'カテゴリ登録';

        // return view('register.daily',compact('items','categories','tags','title'));
        // return $this->index($request)->with('register.daily');
        return view('register.daily',compact('items','categories','tags','title'));
        
    }

}