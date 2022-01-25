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
    public function index(Request $request)
    {
        $items=Item::all();
        // $items = $request->user()->items()->get();
        $tags=Tags::all();
        // $tags = $request->user()->tags()->get();
        $categories=Category::all();
        // $categories = $request->user()->categories()->get();

        // viewを返す(compactでviewに$categoriesを渡す)
        return view('register/index', compact('items','tags','categories'));
    }

    public function show($id)
    {
        $items=Item::all();
        $tags=Tags::all();
        $categories=Category::all();

        return view('register/list',compact('items','tags','categories'));
    }
}
