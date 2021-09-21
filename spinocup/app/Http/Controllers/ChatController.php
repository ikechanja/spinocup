<?php

namespace App\Http\Controllers;
use App\Events\ChatEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class ChatController extends Controller
{
    public function chat(){
        return view('chat');
    }
    //
   // public function send(Request $request){
    public function send(Request $request){
        $user=User::find(Auth::user()->id);
        //$user=User::find(1);
        //$message = 'Hello';

        $user = Auth::user();
        $message = $request->message;
        Message::create([
        'user_id' => $user->id,
        'message' => $message
        ]);

        event(new ChatEvent($request->message,$user));

        return redirect()->route('home');
       }
}
