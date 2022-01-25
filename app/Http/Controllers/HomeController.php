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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * カテゴリー一覧画面
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        $items=Item::all();
        $tags=Tags::all();
        $categories=Category::all();

        // viewを返す(compactでviewに$categoriesを渡す)
        return view('register/index', compact('items','tags','categories'));
    }

    public function show($id)
    {

        // $categories=Category::find($id);
        // $categories=DB::table('categories')
        // ->select('id','name')
        // ->get();
        // $items=DB::table('items')
        // ->select('id','user_id','name','stock')
        // ->get();
        // return view('list')->with([
        //     "$categories"=>category,
        //     "$items"=>items,
        // ]);
    }
}
