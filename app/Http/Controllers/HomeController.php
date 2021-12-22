<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * 一覧画面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // // categoriesテーブルからkey,valueを$categoriesに格納
        $categories=DB::table('categories')
        ->select('key','value')
        ->get();

        // viewを返す(compactでviewに$categoriesを渡す)
        return view('register/index',compact('categories'));
    }
}
