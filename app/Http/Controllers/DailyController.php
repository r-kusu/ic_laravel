<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Tags;
use App\Models\ItemTags;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;




class DailyController extends Controller
{
    //日用品登録画面の表示
    public function index(Request $request){
        if ( Auth::check() ){
            // ログイン済みの時の処理
            $items = $request->user()->items()->get();
            //$user = $request->user();
            //$tags = $user->tagsearch();
            //$categories = $user->categorysearch();

            //return view('register.daily', compact('items', 'tags', 'categories'));
            $categories =  Category::get();
            // modified by K at Jan. 28 2022
            $tags = Tags::all();
            $title = '登録';
            
            return view('register.daily',compact('items', 'categories','tags','title'));
        } else {
            // ログインしていないときの処理
            return redirect( 'login' ); // リダイレクトの方が良い！
        }
        //$categories =  Category::get();
        //$tags = Tags::all();
        //$items = $request->user()->items()->get();

        //return view('register.daily',compact('categories', 'tags', 'items'));
    }

    //日用品登録処理
    public function create(Request $request)
    {
        //入力値のチェック
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

        // アップロードした画像を取得
        $image_name = $request->file('image_name');


        // 画像名を取得
        $name = $image_name->getClientOriginalName();
        // アップロードした画像を一時保存フォルダ（tmp）へと保存する
        $image_name->storeAs('public/images/tmp/', $name);
        //  viewで表示するためのURL
        $response['image_path'] = Storage::url('public/images/tmp/'. $name);        
        //  画像を一律に縮小
        $resized_image = Image::make($image_name)->fit(640, 360)->encode('jpg');
        
        // アップロードした画像のファイル名を取得
        // view側でファイル名をpostするようにしておく
        // $name = $request->get('image');
        // アップロードしたファイルを本番ディレクトリに公開
        $image_name = '';
        if($name) {
            // 本番ディレクトリに同名ファイルが存在する場合は削除
            Storage::delete('public/images/'. $name);
            // ファイルを移動
            Storage::move('public/images/tmp/'. $name, 'public/images/'. $name);

            $image_name = Storage::url('public/images/'.$name);
            
        }
    
        $item = Item::create([
            // TODO: ログインしている情報からユーザーID取得
            'user_id' => $id, 
            'name'=>$request->input('name'),
            'image_name'=>$image_name,
            'category_id' =>1, // ダミー―データ
            'stock'=>$request->input('stock'),
            'threshold'=>$request->input('threshold'),
            'category_id'=>$request->input('category_id'),
            'place'=>$request->input('place')
        ]);

        
        // vvvv The tag functionality section is modified by K, Jan. 28 2022 vvvv
        // requestのtag_nameには"#タグ1 #タグ2 #タグ3"とスペース区切り，かつ１つのタグに#記号が付与されている前提
        $tag_array = [];        // 既にあるタグの配列
        $new_tag_array = [];    // 新しいタグの配列
        error_log("DailyController:create() original tag:" . $request->input('tag_name'));
        foreach (explode(" ", $request->input('tag_name')) as $tag) {
            // #記号を落とす
            $tag = substr($tag, 1);
            // 既にあるタグか，新しいタグを判別する
            $tag_record = Tags::where("tag_name", $tag)->first();
            if ( $tag_record ) {    // 検索して1件でもあったら，既にあるタグとして扱う
                error_log("DailyController:create() alread have the tag:" . $tag);
                array_push($tag_array, $tag_record);
            } else {    // 検索してなかった場合，Tagsテーブルにレコード追加する必要あり
                error_log("DailyController:create() the tag is new!:" . $tag);
                array_push($new_tag_array, $tag);
            }
        }
        
        // 新しいタグの作成
        foreach($new_tag_array as $newtag) {
            $newtagrecord = Tags::create([
                "tag_name" => $newtag,
            ]);
            // 既にあるタグレコード配列に追加
            array_push($tag_array, $newtagrecord);
        }
        
        // 既にあるタグ+新しいタグの中間テーブルのレコード追加
        foreach($tag_array as $existedtag) {
            ItemTags::create([
                "item_id" => $item->id,
                "tag_id" => $existedtag->id,
            ]);
        }
        
        return $this->index($request, compact('item', 'selected_category', 'categories', 'selected_tags', 'tags', 'items','title'));
        
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
            /*
            $item = Item::find($item_id);
            $category = Category::where('item_id',$item_id)->first();

            $items = $request->user()->items()->get();
            $user = $request->user();
            $tags = $user->tagsearch();
            $categories = $user->categorysearch();

            return view('edit.editdaily', compact('item', 'item_id','category','items', 'tags', 'categories'));
            */
            $items = $request->user()->items()->get();
            $item = Item::find($item_id);
            // $category = Category::where('item_id',$item_id)->first();
            // カテゴリの検索
            $selected_category =  Category::find($item->category_id);
            // $selected_category =  Category::where('id', $item->category_id)->first();
            $categories = Category::all();
            $title='編集';
            
            //タグの検索 
            $selected_tags = Item::find($item_id)->tags()->orderBy('tag_name')->get();
            $tags = Tags::all();
    
            // foreach($categories as $category){
            //     if(!in_array($category->name,$names)){
            //         $names[] = $category->name;
            //     }
            return view('edit.editdaily', compact('item', 'selected_category', 'categories', 'selected_tags', 'tags', 'items','title'));
        } else {
            // ログインしていないときの処理
            return redirect( 'login' );
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
        $item->category_id = $request->input('category_id');

        $item->save();

        //タグの検索 ⇦※editで表示させているからupdateではいらない？？？
        // $selected_tags = Item::find($item_id)->tags()->orderBy('tag_name')->get();
        
        // modified by K at Jan. 28 2022
        //全てのタグを検索
        // ちょっと変だけど，タグ名 => タグIDの連想配列を生成
        $tagsrecord = Tags::all();
        $alltags = [];
        foreach ($tagsrecord as $tagrecord) {
            $tagstr = $tagrecord->tag_name;
            $tagid = $tagrecord->id;
            if (!array_key_exists($tagstr, $alltags))
                $alltags += array($tagstr => $tagid);
        }
        
        // itemに紐ついているタグを取得
        $had_itemtagsrecord = ItemTags::tags($item->id)->get();
        $hadtags = [];
        foreach ($had_itemtagsrecord as $had_record) {
            $tagstr = $had_record->tag_name;
            $tagid = $had_record->tag_id;
            if (!array_key_exists($tagstr, $hadtags))
                $hadtags += array($tagstr => $tagid);
        }

        //1. requestからタグ（複数）を受け取る．タグを分解して配列状にする
        $newtags = [];
        $tag_array = [];        // 既にあるタグの配列
        $new_tag_array = [];    // 新しいタグの配列

        foreach (explode(" ", $request->input('tag_name')) as $tag) {
            $tagname = substr($tag, 1);
            if (!in_array($tag, $newtags))
                array_push($newtags, $tag);
        }

        foreach ($newtags as $tagname) {
            // 既存タグに新タグが含まれているかをチェック
            // 既存タグに更新タグがない場合
            if (!array_key_exists($tagname, $hadtags)) {
                // 全タグの中にない場合
                $newtagrecord = null;
                if (!array_key_exists($tagname, $alltags)) {
                    // ***** タグを新規登録 *****
                    // foreach($newtags as $newtag) {
                    $newtagrecord = Tags::create([
                        "tag_name" => $tag,
                    ]);
                    // }
                        // 既にあるタグレコード配列に追加
                        //array_push($tag_array, $newtagrecord);                
                } else {
                    $newtagrecord = Tags::find($alltags[$tagname]);
                }
                // ***** ItemTagsにタグを追加 *****
                ItemTags::create([
                    "item_id" => $item->id,
                    "tag_id" => $newtagrecord->id
                ]);
            } else {
                error_log("update d: " . $tagname);
                // 既存タグの中にあった場合，既存タグから削除
                unset($hadtags[$tagname]);
            }
        }

        // ItemTagsの削除
        foreach ($hadtags as $name => $id) {
            ItemTags::where('item_id', $item->id)->where('tag_id', $id)->delete();
        }
        // この時点で$hadtagsにあるタグは削除対象
        return redirect('/editdaily/' . $item_id)->with('success', '編集しました');
    }

    

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $item_id
    * @return \Illuminate\Http\Response
    */
    public function delete($item_id)
    {
    
    $item = Item::find($item_id);

    // ItemTagの削除
    ItemTags::where('item_id', $item_id)->delete();
    
    // Itemの削除
    Item::where('id', $item_id)->delete();
    
    // Tagの削除はしない。
    return redirect('/')->with('success', '削除しました');
    }
}

