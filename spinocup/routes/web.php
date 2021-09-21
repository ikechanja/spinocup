<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController; 

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

Route::get('/groupU', function () {
    return view('group.groupU');
});

Route::get('/newgroup', function () {
    return view('group.newgroup');
});

Route::post('/store', [RoomController::class,'exeStore'])->name('store');
Route::get('/list1', [RoomController::class,'showList1'])->name('list1');
Route::get('/list2', [RoomController::class,'showList2'])->name('list2');
Route::get('/list3', [RoomController::class,'showList3'])->name('list3');
Route::get('/list4', [RoomController::class,'showList4'])->name('list4');


