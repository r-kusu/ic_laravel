<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Tags;
use App\Models\ItemTags;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeUnit\FunctionUnit;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * カテゴリー一覧画面
     *
     * @param Request $request
     * @return Response
     */
    public function home(Request $request)
    {
        $items = $request->user()->items()->get();
        $user = $request->user();
        $categories = $user->categorysearch();
        $tags = $user->tagsearch();

        if (Auth::check()) {
            // ログイン済みの時の処理
            // $categories=Category::select('name')->get();
            // viewを返す(compactでviewに$items,$tags,$categoriesを渡す)
            return view('register/index', compact('items', 'categories', 'tags'));
        } else {
            // ログインしていないときの処理
            return redirect('login');
        }
    }

    // カテゴリー選択したアイテムリスト
    public function show(Request $request, string $category_id)
    {
        $items = $request->user()->items()->get();
        $user = $request->user();
        $categories = $user->categorysearch();
        $tags = $user->tagsearch();
        // $listitem = $user->listitem($category_id);
        $title = 'カテゴリーアイテム一覧';
        $s_result = $user->listitem($category_id);
        return view('register.search', compact('items', 'tags', 'categories', 's_result','title'));
    }

    // 買い物リスト
    public static function shortageitem(Request $request)
    {
        $items = $request->user()->items()->get();
        $user = $request->user();
        $categories = $user->categorysearch();
        $tags = $user->tagsearch();
        // $shortageitems = $user->shortage();
        // return view('register/shortagelist', compact('items', 'tags', 'categories', 'shortageitems'));
        $s_result = $user->shortage();
        $title = '買い物リスト';
        return view('register.search',compact('items','tags','categories','s_result','title'));
    }

    // 検索機能
    public function searchresult(Request $request)
    {
        // 入力される値nameの中身を定義する
        $keyword = $request->input('keyword'); //アイテム名の値
        $category = $request->input('category');
        $tagName = $request->input('tag');
        $placeName = $request->input('place'); //保管場所の値

        // $query = Item::query();
        $user = $request->user();
        $query = Item::where('user_id',$user->id);
        // アイテム名が入力された場合、itemテーブルから一致するアイテムを$queryに代入
        if (isset($keyword)) {
            $query->where('name', 'like', '%' . ($keyword) . '%');
        }
        // カテゴリー
        if (isset($category)) {
            $query->where('category_id',$category);
        }
        // タグ
        if (isset($tagName)) {
            $query->join('item_tags','items.id','item_tags.item_id')
            ->where('item_tags.tag_id',$tagName);
        }
        // 保管場所が選択された場合、itemテーブルからplaceが一致すアイテムを$queryに代入
        if (isset($placeName)) {
            $query->where('place', $placeName);
        }
        // $queryをitemテーブルのidの昇順に並び変えて$itemsに代入
        // $items = $query->where->orderBy('id','asc')->paginate(15);

        // itemsは検索結果ではなく、サイドバーのコンボボックスを表示するための変数
        $items = $request->user()->items()->get();
        // $user = $request->user();
        // s_resultが検索結果
        $s_result = $query->get();

        $tags = $user->tagsearch();
        $categories = $user->categorysearch();

        // itemテーブルからplacesearch();関数でidとplaceを取得
        // $place = new Item;
        // $places = $request->user()->items()->placesearch();
        $places = DB::table('items')->select('place')->where('user_id', $user->id)->distinct()->get();
        $title = '検索結果';
        return view('register.search', compact('items', 'tags', 'categories', 'places', 'keyword', 'placeName','s_result','title'));
    }
}