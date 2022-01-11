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
        return view('edit.editdaily', compact('item', 'item_id'));
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
        
        $category= Category::find($item_id);
        
        $category->name=$request->input('category_name');

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

