<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    public function index(Request $request) 
    {
        // error_log("index");
        $items = $request->user()->items()->get();
        $user = $request->user();
        $tags = $user->tagsearch();
        $categories = $user->categorysearch();
        $title = 'ユーザー編集画面';
        
        return view('personal-info',
            compact('user', 'categories','tags','items','title'
        ));
    }

    public function update(Request $request, $id)
    {
        error_log("update");
        $users = user::find($id);

        $request -> validate([
            'name' => 'required|max:50',
            // 'email'=>['unique:users,email'],
            'email' => [Rule::unique('users','email')->whereNot('email',$users->email)],
        ]);

        $users->name = $request->name;
        // error_log("update name:" . $request->name);
        $users->email = $request->email;
        // $users->password = Hash::make($request->password);
        $users->save();

        // modified by K 2022.3.5
        // return redirect('/personal-info', ['id'=>$request->id]);
        return redirect( route('personal-info', ['id'=>$id]) );
    }

    public function updatepass(Request $request)
    {
        $user = User::find($request->id);
        $pass = $user->password;
        // print_r($pass);echo'<br>';
        // print_r(Hash::make($request->current_password));
        // exit;
        if (!Hash::check($request->current_password, $pass)) {
            $request -> validate([
                // 現在のパスワードと一致しているかのバリデーション
                'current_password'=> [
                    'current_password',
                    'required',
                ],
            ]);
        }


        $request -> validate([
            // 現在のパスワードと一致しているかのバリデーション
            'new_password'=> [
                'required',
                'min:6',
                'max:32',
            ],
            'password-confirm'=> [
                'required',
                'same:new_password',
            ],
        ]);

        $user->password = Hash::make($request->new_password);
        $user->save();

        // modified by K 2022.3.5
        // return redirect('/personal-info', ['id'=>$request->id]);
        return redirect( route('personal-info', ['id'=>$request->id]) );
    }

    public function delete(Request $request)
    {
        // ここに削除処理を入れるが，自分自身を削除した後は，ログアウト処理をして
        // ログイン画面にリダイレクトする必要がある
        $user = user::find($request->id);
        $user -> delete();
        // ここにアイテムの削除（2022/4/4）
        return redirect( asset('/logout') );
    }

}


// class UserRequest extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      *
//      * @return bool
//      */
//     public function authorize()
//     {
//         return true;
//     }
//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array
//      */
//     public function rules()
//     {
//         if (isset($request->id)) {
//             // 編集画面のバリデーション（編集画面ではinputのtype="hidden"でidの値があるかで登録画面か編集画面か判別できる）

//             // 現在のパスワードフォームに入力したパスワード
//             $pass = $request->currnet_password;

//             // idをもとに、userテーブルから一意のレコードを絞り込む
//             $user = User::find($request->id);
//             // 現在のパスワードを取得
//             $currentPass = $user->password;
//         }
//         return [
//             // ユーザー名
//             'name' => 'required',
//             // メールアドレス
//             'email' => [
//                 'required',
//                 'unique:users,email',
//             ],
//             // パスワード
//             'current_password' => [
//                 function ($attribute, $value, $fail) use ($pass, $currentPass) {
//                     if (!Hash::check($pass, $currentPass)) {
//                         // $passはフォームに入力した値で、$currentPassはuserのDBにあるハッシュ化されたパスワードで、
//                         // Hash::check('入力パスワード', 'ハッシュ化されたパスワード')で比較できる。
//                         return $fail('現在のパスワードと入力したパスワードが一致しません。');
//                     }
//                 } 
//             ],
//             // 新規パスワード
//             'new_password' => [
//                 'required',
//                 'min:8',
//                 'max:32',
//                 'regix:/^(?=.*?[a-zA-Z])(?=.*\d)[a-zA-Z\d]/' // 正規表現を使って半角英数字混在
//             ],
//             // 確認用パスワード
//             'password-confirm' => [
//                 'required',
//                 'same:new_password',
//             ],
//         ];
//     }

//     public function messages()
//     {
//         return [
//             'name.required' => 'ユーザー名は必須です。',
//             'email.required' => 'メールアドレスは必須です。',
//             'email.unique' => 'このメールアドレスは既に使用されております。',
//             'new_password.required' => 'パスワードは必須です。',
//             'new_password.min' => 'パスワードは8桁以上で入力してください。' ,
//             'new_password.max' => 'パスワードは32桁以下で入力してください。',
//             'new_password.regix' => 'パスワードは半角英数字混在で入力してください。',
//             'password_confirm.required' => 'パスワード確認用は必須です。',
//             'password_confirm.same' => '新規パスワードとパスワード確認用が一致しません。',
//         ];
//     }
// }