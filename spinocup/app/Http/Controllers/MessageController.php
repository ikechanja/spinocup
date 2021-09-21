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

    public function readmes($event){
        $messageall = Message::find($event);
        return view('chat',['messageall' => $messageall]);
    }

    // public function writemes(Request $request){
    //     $user = Auth::user();
    //     $message = $request->input('comment');
    //     Message::create([
    //     'login_id' => $user->id,
    //     'comment' => $message
    // ]);
    // return redirect()->route('home');
    // }
}
