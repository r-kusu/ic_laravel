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
        $tags = $user->tagsearch();
        $categories = $user->categorysearch();

        if ( Auth::check() ){
            // ログイン済みの時の処理
            $categories=Category::select('name')->get();
            // viewを返す(compactでviewに$items,$tags,$categoriesを渡す)
            return view('register/index', compact('items', 'tags', 'categories'));
        } else {
            // ログインしていないときの処理
            return redirect( 'login' );
        }

    }

    // カテゴリー選択したアイテムリスト
    public function show(Request $request, string $category_id)
    {
        $items = $request->user()->items()->get();
        $user = $request->user();
        $tags = $user->tagsearch();
        $categories = $user->categorysearch();
        $listitem = $user->listitem($category_id);

        return view('register/list', compact('items', 'tags', 'categories', 'listitem'));
    }
    // 買い物リスト
    public static function shortageitem(Request $request)
    {
        $items = $request->user()->items()->get();
        $user = $request->user();
        $tags = $user->tagsearch();
        $categories = $user->categorysearch();
        $shortageitems = $user->shortage();
        return view('register/shortagelist', compact('items', 'tags', 'categories', 'shortageitems'));
    }

    // 検索機能
    // public function itemsearch(Request $request)
    // {
    //     $keyword_name = $request->name;
    //     $keyword_category = $request->category;
    //     $keyword_tag = $request->tag;
    //     $keyword_place = $request->place;
    // }

}