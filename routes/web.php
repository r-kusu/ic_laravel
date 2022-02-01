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

Route::post('/daily/create',[DailyController::class, 'create']);

Route::get('/food',function () {return view('register.food');});

Route::get('/editdaily/{itemid}', [DailyController::class, 'edit']);
Route::put('/editdaily/{itemid}/update', [DailyController::class, 'update'])->name('edit');

Route::delete('/editdaily/{itemid}',[DailyController::class, 'delete'])->name('delete.editdaily');

Route::get('/list/{id}', [HomeController::class, 'show'])->name('list');
Route::get('/shortagelist', [HomeController::class, 'shortageitem'])->name('shortagelist');
// Route::get('/search', [HomeController::class, 'itemsearch'])->name('search');

Route::get('/logout',[LoginController::class,'logout']);