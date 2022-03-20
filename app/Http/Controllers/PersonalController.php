<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;

class PersonalController extends Controller
{
    public function index(Request $request) 
    {
        error_log("index");
        $items = $request->user()->items()->get();
        $user = $request->user();
        $tags = $user->tagsearch();
        $categories = $user->categorysearch();
        
        return view('personal-info',
            compact('user', 'categories','tags','items'
        ));
    }

    public function update(Request $request, $id)
    {
        $request -> validate([
            'name' => 'required|max:50',
            'email'=>['unique:users,email'],
        ]);

        $users = user::find($id);
        $users->name = $request->name;
        error_log("update name:" . $request->name);
        $users->email = $request->email;
        // $users->password = Hash::make($request->password);
        $users->save();

        // modified by K 2022.3.5
        // return redirect('/personal-info', ['id'=>$request->id]);
        return redirect( route('personal-info', ['id'=>$id]) );
    }

    // modified by K 2022.3.5
    public function delete(Request $request, $id)
    {
        // ここに削除処理を入れるが，自分自身を削除した後は，ログアウト処理をして
        // ログイン画面にリダイレクトする必要がある
        return redirect( asset('/logout') );
    }

    public function updatepass(Request $request)
    {
        $request -> validate([
            'password'=>['unique:users,password'],
        ]);

        $users = user::find($request->id);
        $users->password = Hash::make($request->password);
        $users->save();

        // modified by K 2022.3.5
        // return redirect('/personal-info', ['id'=>$request->id]);
        return redirect( route('personal-info', ['id'=>$request->id]) );
    }

}
