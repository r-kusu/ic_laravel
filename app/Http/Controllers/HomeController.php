<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Tags;
use App\Models\ItemTags;
use App\Models\User;

use Illuminate\Support\Facades\DB;

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

        // viewを返す(compactでviewに$items,$tags,$categoriesを渡す)
        return view('register/index', compact('items', 'tags', 'categories'));
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

        // 買い物リスト
        // どれも絞り込まれない
        // $shortageitems = $request->user()->items()->where('stock','<','threshold')->get();

        // $shortageitems = $request->user()->items()->whereColumn('stock','<','threshold')->get();

        // $shortageitems = DB::table('items')
        // ->whereColumn('stock','<','threshold')->get();
        // ->where('stock','<','threshold')->get();
        // $this->items->whereColumn('stock','<','threshold')->get();

        $shortageitems = $user->shortage();

        return view('register/shortagelist', compact('items', 'tags', 'categories'));
    }


    public function itemsearch(Request $request)
    {
        // $keyword_name = $request->name;
        $keyword_age = $request->age;
        $keyword_sex = $request->sex;
        $keyword_age_condition = $request->age_condition;

        if (!empty($keyword_name) && empty($keyword_age) && empty($keyword_age_condition)) {
            $query = User::query();
            $users = $query->where('name', 'like', '%' . $keyword_name . '%')->get();
            $message = "「" . $keyword_name . "」を含む名前の検索が完了しました。";
            return view('/serch')->with([
                'users' => $users,
                'message' => $message,
            ]);
        } elseif (empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 0) {
            $message = "年齢の条件を選択してください";
            return view('/serch')->with([
                'message' => $message,
            ]);
        } elseif (empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 1) {
            $query = User::query();
            $users = $query->where('age', '>=', $keyword_age)->get();
            $message = $keyword_age . "歳以上の検索が完了しました";
            return view('/serch')->with([
                'users' => $users,
                'message' => $message,
            ]);
        } elseif (empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 2) {
            $query = User::query();
            $users = $query->where('age', '<=', $keyword_age)->get();
            $message = $keyword_age . "歳以下の検索が完了しました";
            return view('/serch')->with([
                'users' => $users,
                'message' => $message,
            ]);
        } elseif (!empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 1) {
            $query = User::query();
            $users = $query->where('name', 'like', '%' . $keyword_name . '%')->where('age', '>=', $keyword_age)->get();
            $message = "「" . $keyword_name . "」を含む名前と" . $keyword_age . "歳以上の検索が完了しました";
            return view('/serch')->with([
                'users' => $users,
                'message' => $message,
            ]);
        } elseif (!empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 2) {
            $query = User::query();
            $users = $query->where('name', 'like', '%' . $keyword_name . '%')->where('age', '<=', $keyword_age)->get();
            $message = "「" . $keyword_name . "」を含む名前と" . $keyword_age . "歳以下の検索が完了しました";
            return view('/serch')->with([
                'users' => $users,
                'message' => $message,
            ]);
        } elseif (empty($keyword_name) && empty($keyword_age) && $keyword_sex == 1) {
            $query = User::query();
            $users = $query->where('sex', '男')->get();
            $message = "男性の検索が完了しました";
            return view('/serch')->with([
                'users' => $users,
                'message' => $message,
            ]);
        } elseif (empty($keyword_name) && empty($keyword_age) && $keyword_sex == 2) {
            $query = User::query();
            $users = $query->where('sex', '女')->get();
            $message = "女性の検索が完了しました";
            return view('/serch')->with([
                'users' => $users,
                'message' => $message,
            ]);
        } else {
            $message = "検索結果はありません。";
            return view('/serch')->with('message', $message);
        }
    }
}
