<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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
        // // categoriesテーブルからkey,valueを$categoriesに格納
        // $categories=DB::table('categories')
        // ->select('name',)
        // ->get();

        if ( Auth::check() ){
            // ログイン済みの時の処理
            $categories=Category::select('name')->get();
            // viewを返す(compactでviewに$categoriesを渡す)
            return view('register/index',compact('categories'));
        } else {
            // ログインしていないときの処理
            return view( 'auth.login' );
        }
    }
}
