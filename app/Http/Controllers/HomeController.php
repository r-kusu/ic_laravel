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

            // $categories=Category::select('name')->get();
            // viewを返す(compactでviewに$items,$tags,$categoriesを渡す)
            return view('register/index', compact('items', 'tags', 'categories'));

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

    // Qiita
    // public function search(Request $request) {
    //     $keyword_name = $request->name;
    //     $keyword_category = $request->category;
    //     $keyword_tag = $request->tag;
    //     $keyword_place = $request->place;

    //     if(!empty($keyword_name) && empty($keyword_category) && empty($keyword_tag) && ($keyword_place)){
    //         $query = Items::query();
    //         $results = $query->where('name','like','%' .$keyword_name. '%')->get();
    //         $message = "検索条件:".$keyword_name;
    //         return view('register/search')->with([
    //             'results'=>$results,
    //             'message'=>$message,
    //         ]);
    //     }




    // tetatail
//     public function itemsearch(Request $request)
//     {
//         $keyword_name = $request->input('keyword');
//         $keyword_category = $request->input('category');
//         $keyword_tag = $request->input('tag');
//         $keyword_place = $request->input('place');
// if(isset($keyword_category)){

// }
//         return view('register/search',compact());
//     }





}
