<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * 会員登録画面表示
     * 
     * @return view
     */
    public function register()
    {
        return view('register');
    }
    /**
     * 会員登録処理
     * 
     * @return view
     */
    public function exeStore()
    {
        \Session::flash('success_msg', 'おめでとうございます。新規会員登録が完了しました。');
        return redirect(route('registerSuccess'));
    }
}
