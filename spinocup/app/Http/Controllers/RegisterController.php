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
}
