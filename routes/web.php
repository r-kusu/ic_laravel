<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/daily',[DailyController::class, 'index']);

// Route::group(['plefix'=>'register'],function(){
//     Route::get('/index',[HomeController::class, 'index'])->name('register.index');
// });
Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/daily',[App\Http\Controllers\DailyController::class, 'index']);

Route::post('/daily/create',[App\Http\Controllers\DailyController::class, 'create'])->middleware('auth');

Route::get('/food',function () {return view('register.food');})->middleware('auth');

Route::get('/editdaily/{itemid}', [App\Http\Controllers\DailyController::class, 'edit'])->middleware('auth');
Route::put('/editdaily/{itemid}/update', [App\Http\Controllers\DailyController::class, 'update'])->name('edit')->middleware('auth');
Route::delete('/editdaily/{itemid}',[App\Http\Controllers\DailyController::class, 'delete'])->name('delete.editdaily')->middleware('auth');

Route::get('/list/{id}', [HomeController::class, 'show'])->name('list');
Route::get('/shortagelist', [HomeController::class, 'shortageitem'])->name('shortagelist');
// Route::get('/search', [HomeController::class, 'itemsearch'])->name('search');

Route::get('/logout',[LoginController::class,'logout']);
