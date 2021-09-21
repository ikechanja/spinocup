<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    /**
     * @return View
     */
    public function showLogin()
    {
        return view('login_form');
    }

    /**
     * @param App\Http\Requests\LoginFormRequest
     * $request
     */
    public function login(LoginFormRequest $request)
    {

        $credentials = $request->only('email', 'password');
        $input_password = bin2hex($credentials['password']);
        $user = DB::table('users')->where('email', '=', $credentials['email'])->where('password', '=', $input_password)->first();
        if (!$user) {
            return back()->withErrors([
                'notMatch' => 'メールアドレスが存在しません',
            ]);
        }
        if (Auth::loginUsingId($user->id)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('top')->with('logout', 'ログアオウトしました。');
    }
}
