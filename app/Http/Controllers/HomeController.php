<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
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
     * 一覧画面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // categoriesテーブルからid,nameを$categoriesに格納
        $categories=DB::table('categories')
        ->select('id','name')
        ->get();

        // viewを返す(compactでviewに$categoriesを渡す)
        return view('register/index',compact('categories'));
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