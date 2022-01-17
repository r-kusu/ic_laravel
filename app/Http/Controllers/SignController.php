<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SignController extends Controller
{
    public function func()
    {
        // // categoriesテーブルからkey,valueを$categoriesに格納
        // $categories=DB::table('categories')
        // ->select('key','value')
        // ->get();

        // viewを返す(compactでviewに$categoriesを渡す)
        return view('home');
    }

    /**
     * 会員登録
     *
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50', 
            'email' => 'required|max:254',
            'password' => 'required|min:6|max:32',
        ]);

        // 作成
        user::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/login');
    }
}
