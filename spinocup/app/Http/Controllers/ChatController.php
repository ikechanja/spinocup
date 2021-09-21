<?php

namespace App\Http\Controllers;
use App\Events\ChatEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        
        event(new ChatEvent($request->message,$user));
        
       }
}
