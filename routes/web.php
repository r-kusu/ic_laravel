<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/food',function () {
    return view('register.food');
});

