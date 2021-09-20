<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

// トップ画面
Route::get('/', function () {
    return view('top');
})->name('top');

// 新規会員登録成功表示
Route::get('/register/success', [RegisterController::class, 'registersuccess'])->name('registersuccess');

// 新規会員登録画面表示
Route::get('/register', [RegisterController::class, 'register'])->name('register');

// 新規会員登録処理
Route::post('/register/store', [RegisterController::class, 'exeStore'])->name('store');

// ログイン画面
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');

// ログイン処理
Route::post('/login/store', [AuthController::class, 'login'])->name('login');

// ホーム画面
Route::get('/home', function () {
    return view('home');
})->name('home');
