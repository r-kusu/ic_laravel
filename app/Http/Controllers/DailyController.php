<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Tags;
use App\Models\ItemTags;

class DailyController extends Controller
{
    //日用品登録画面の表示
    public function index(){

        $categories =  Category::get();

        return view('register.daily',compact('categories'));
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
            'category_id'=>$request->input('category_id'),
            'place'=>$request->input('place')
        ]);
        
        // TODO: タグを中間テーブルで商品と紐づける＆タグが新規であればタグテーブルに挿入
        error_log("DailyController:create:tag_name : " . $request->input('tag_name'));
        $existed_tag = Tags::where("tag_name", "=", $request->input('tag_name'))->first();
        $tag_id = "";


        if ( $existed_tag != null ) {
            $tag_id = $existed_tag->id;
        } else {
            $tags = Tags::create([
                'tag_name'=>$request->input('tag_name'),
            ]);
            $tag_id = $tags->id;
        }

        //中間テーブル
        //$item = Item::find(1);
        //$tags = Item::find(1)->tags()->orderBy('tag_name')->get();
        error_log("DailyController:create:item_id : " . $item->id);
        error_log("DailyController:create:tag_id : " . $tag_id);
        ItemTags::create([
//            'item_id'=>$request->input('item_id'), 
//            'tag_id' =>$request->input('tag_id')
            'item_id'=>$item->id, 
            'tag_id' =>$tag_id,
        ]);


        // カテゴリ-を登録※質問する。（ここのメソッドいる？）
        $categories =  Category::get();
        $names = [];
        
        foreach($categories as $category){
            if(!in_array($category->name,$names)){
                $names[] = $category->name;
            }
        }
        
        return view('register.daily',compact('names','categories'));
    }
    


    //編集処理
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $item_id
    * @return \Illuminate\Http\Response
    */
    public function edit($item_id)
    {
        $item = Item::find($item_id);
        $category = Category::where('item_id',$item_id)->first();
        return view('edit.editdaily', compact('item', 'item_id','category'));
        
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $item_id
    * @return \Illuminate\Http\Response
    */    
    public function update(Request $request, $item_id)
    {
        $request->validate([
            'name'=>['required'],
            'stock'=>['required','integer','min:0'],
            'threshold'=>['required','integer','min:0'], 
            'place'=>['required'],   
        ]);

        $item = Item::find($item_id);
                // TODO: ログイン情報からユーザーID取得
            
        $item->name=$request->input('name');
        $item->image_name = $request->input('image_name');
        $item->stock = $request->input('stock');
        $item->threshold = $request->input('threshold');
        $item->place = $request->input('place');

        $item->save();
        
        $category= Category::where('item_id',$item_id)->first();
        
        $category->name=$request->input('name');

        $category->save();

        return redirect('/')->with('success', '編集しました');

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $item_id
    * @return \Illuminate\Http\Response
    */
    public function delete($item_id)
    {
    Item::where('id', $item_id)->delete();
    return redirect('/')->with('success', '削除しました');
    }
}

