<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     *
     * 
     * @return view
     **/

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function readmes(){
        $messageall = Message::with('user')->get();
        return view('chat',['messageall' => $messageall]);
    }

    public function writemes(){
        $message = Message::user()->all();
        return view('chat',['message' => $message]);
    }
}
