<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Tags;
use App\Models\ItemTags;
use App\Models\User;

use Illuminate\Support\Facades\DB;
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
    public function index(Request $request)
    {
        $items = $request->user()->items()->get();
        $user = $request->user();
        $tags = $user->tagsearch();
        $categories = $user->search();

        if ( Auth::check() ){
            // ログイン済みの時の処理
            $categories=Category::select('name')->get();
            // viewを返す(compactでviewに$items,$tags,$categoriesを渡す)
            return view('register/index', compact('items', 'tags', 'categories'));
        } else {
            // ログインしていないときの処理
            return view( 'auth.login' );
        }
    }

    // カテゴリー選択したアイテムリスト
    public function show(Request $request)
    {
        $items = $request->user()->items()->get();
        $user = $request->user();
        $tags = $user->tagsearch();
        $categories = $user->search();

        // viewを返す(compactでviewに$items,$tags,$categoriesを渡す)
        return view('register/list', compact('items', 'tags', 'categories'));

        $shortageitems = $user->shortage();

        return view('register/shortagelist', compact('items', 'tags', 'categories'));
    }
}
