<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daily;

class DailyController extends Controller
{
    //日用品登録画面の表示
    public function index(){
        return view('register.daily');
    }
    

    //日用品登録処理
    public function create(Request $request){
        dd($request);
        // Daily::create([
        //     'user_id' => 0,
        //     'name' => $request ->namespace
        // ]);
        
        return redirect('/daily');
        
    }
}

