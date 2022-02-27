<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\HTTP\Controllers\HomeController;
use App\HTTP\Controllers\DailyController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');

Route::get('/daily',[DailyController::class, 'index'])->middleware('auth');

// Route::group(['plefix'=>'register'],function(){
//     Route::get('/index',[HomeController::class, 'index'])->name('register.index');
// });


//Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

//Route::get('/daily',[App\Http\Controllers\DailyController::class, 'index'])->middleware('auth');

Route::post('/daily/create',[App\Http\Controllers\DailyController::class, 'create'])->middleware('auth');

Route::post('/daily/create',[App\Http\Controllers\DailyController::class, 'create'])->name('createdaily');
Route::get('/food',function () {return view('register.food');})->middleware('auth');

Route::get('/editdaily/{itemid}', [App\Http\Controllers\DailyController::class, 'edit'])->middleware('auth');
Route::put('/editdaily/{itemid}/update', [App\Http\Controllers\DailyController::class, 'update'])->name('edit')->middleware('auth');
Route::delete('/editdaily/{itemid}',[App\Http\Controllers\DailyController::class, 'delete'])->name('delete.editdaily')->middleware('auth');

//検索ボタンを押すとコントローラのindexメソッドを実行します
Route::get('/daily/create',[App\Http\Controllers\DailyController::class, 'create'])->name('create');

Route::get('/editdaily/{itemid}', [App\Http\Controllers\DailyController::class, 'edit']);

Route::put('/editdaily/{itemid}/update', [App\Http\Controllers\DailyController::class, 'update'])->name('edit');

Route::delete('/editdaily/{itemid}',[App\Http\Controllers\DailyController::class, 'delete'])->name('delete.editdaily');

//検索ボタンを押すとコントローラのindexメソッドを実行します
Route::get('/daily/create',[App\Http\Controllers\DailyController::class, 'create'])->name('create');

//カテゴリー画面
Route::get('register/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');

Route::post('/category/create', [App\Http\Controllers\CategoryController::class, 'create']);
Route::get('/list/{id}', [HomeController::class, 'show'])->name('list')->middleware('auth');
Route::get('/shortagelist', [HomeController::class, 'shortageitem'])->name('shortagelist')->middleware('auth');

// 検索結果
// Route::get('/search', [HomeController::class, 'search'])->name('search')->middleware('auth');
Route::get('/search',[HomeController::class,'searchresult'])->name('searchresult');

// ログアウト
Route::get('/logout',[LoginController::class,'logout'])->middleware('auth');
