<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoomController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;

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




Route::get('group', function () {
    return view('group.group');
})->name('group');

Route::get('/groupE', function () {
    return view('group.groupE');
});

Route::get('/groupJ', function () {
    return view('group.groupJ');
});

Route::get('/groupH', function () {
    return view('group.groupH');
});

Route::group(['middleware' => ['guest']], function () {
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
});
Route::group(['middleware' => ['auth']], function () {
    // ホーム画面
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // ログアウト処理
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // プロフィール更新画面
    Route::get('/profile/edit/{id}', [HomeController::class, 'update_profile'])->name('update_profile');
    // プロフィール更新処理
    Route::post('/profile/update', [HomeController::class, 'exeUpdate'])->name('update');

    Route::get('/chat', function () {
        return view('chat');
    });

    Route::post('send', [App\Http\Controllers\ChatController::class, 'send']);

    // Route::post('/readmes', [MessageController::class, 'readmes'])->name('readmes');
    Route::get('/readmes/{event}', [MessageController::class, 'readmes'])->name('readmes');

    Route::post('/writemes', [MessageController::class, 'writemes'])->name('writemes');
});

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('chat', [App\Http\Controllers\ChatController::class, 'chat']);
});

Route::get('/groupU', function () {
    return view('group.groupU');
});

Route::get('/newgroup', function () {
    return view('group.newgroup');
});

Route::post('/store', [RoomController::class, 'exeStore'])->name('roomstore');
Route::get('/list1', [RoomController::class, 'showList1'])->name('list1');
Route::get('/list2', [RoomController::class, 'showList2'])->name('list2');
Route::get('/list3', [RoomController::class, 'showList3'])->name('list3');
Route::get('/list4', [RoomController::class, 'showList4'])->name('list4');
