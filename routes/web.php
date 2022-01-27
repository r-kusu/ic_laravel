<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\HTTP\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\SignController::class, 'func']);
Route::post('/register', [App\Http\Controllers\SignController::class, 'register']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('register/index', function () {
    return view('register.index');
});
Route::get('register/list', function () {
    return view('register.list');
});


// Route::group(['plefix'=>'register'],function(){
//     Route::get('/index',[HomeController::class, 'index'])->name('register.index');
// });
// Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/daily',[App\Http\Controllers\DailyController::class, 'index']);

Route::post('/daily/create',[App\Http\Controllers\DailyController::class, 'create']);

Route::get('/food',function () {return view('register.food');});

Route::get('/editdaily/{itemid}', [App\Http\Controllers\DailyController::class, 'edit']);

Route::put('/editdaily/{itemid}/update', [App\Http\Controllers\DailyController::class, 'update'])->name('edit');

Route::delete('/editdaily/{itemid}',[App\Http\Controllers\DailyController::class, 'delete'])->name('delete.editdaily');

//検索ボタンを押すとコントローラのindexメソッドを実行します
Route::get('/daily/create',[App\Http\Controllers\DailyController::class, 'create'])->name('create');

//カテゴリー画面
Route::get('register/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');

Route::post('/category/create', [App\Http\Controllers\CategoryController::class, 'create']);