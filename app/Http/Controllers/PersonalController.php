<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class PersonalController extends Controller
{
    public function index(Request $request) 
    {
        $items = $request->user()->items()->get();
        $user = $request->user();
        $tags = $user->tagsearch();
        $categories = $user->categorysearch();
        
        return view('personal-info',
            compact('user', 'categories','tags','items'
        ));
    }

    public function update(Request $request)
    {
        $users = user::find($request->id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->save();

        return redirect('/personal-info', ['id'=>$request->id]);
    }

}
