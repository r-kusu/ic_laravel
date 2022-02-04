<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use Validator;
use Illuminate\Support\Facades\Auth;


class DailyController extends Controller
{
    //日用品登録画面の表示
    public function index(Request $request){
        if ( Auth::check() ){
          // ログイン済みの時の処理
          $items = $request->user()->items()->get();
          $user = $request->user();
          $tags = $user->tagsearch();
          $categories = $user->categorysearch();

          return view('register.daily', compact('items', 'tags', 'categories'));

        } else {
            // ログインしていないときの処理
            return view( 'auth.login' );
        }
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

        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();
        // var_dump($id);
        // exit;

        // dd($request);
        $item = Item::create([
            // TODO: ログインしている情報からユーザーID取得
            'user_id' => $id, 
            'name'=>$request->input('name'),
            'image_name'=>"ダミー",
            // 'image_name'=>$request->file('image_name'),
            'stock'=>$request->input('stock'),
            'threshold'=>$request->input('threshold'),
            'category_id' =>1, // ダミー―データ
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
    public function edit($item_id,Request $request)
    {
        if ( Auth::check() ){
            // ログイン済みの時の処理
            $item = Item::find($item_id);
            $category = Category::where('item_id',$item_id)->first();

            $items = $request->user()->items()->get();
            $user = $request->user();
            $tags = $user->tagsearch();
            $categories = $user->categorysearch();

            return view('edit.editdaily', compact('item', 'item_id','category','items', 'tags', 'categories'));

        } else {
            // ログインしていないときの処理
            return view( 'auth.login' );
        }        

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

