<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

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
    public function exeStore(RegisterRequest $request)
    {
        // 会員登録のデータを受け取る
        $inputs = $request->all();
        $password_hash = Hash::make($request['passoword']);
        $inputs['password'] = $password_hash;
        dd($inputs);
        // 会員登録
        User::create($inputs);

        \Session::flash('success_msg', 'おめでとうございます。新規会員登録が完了しました。');
        return redirect(route('registerSuccess'));
    }
}
