<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;

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
        dd($request->all());
    }
}
