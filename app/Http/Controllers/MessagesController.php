<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function messages()
    {
        $users_msg = Message::with('user')->where('incoming_id',auth()->id())->groupBy('outgoing_id')->get();
       //dd($users_msg[0]->user[0]['name']);


        return view('personal.messages', compact('users_msg'));
    }
    public function sendIdForMessages(Request $requset)
    {
        $user_id = $requset->id;
        $auth_id = auth()->id();
        $arr = Message::where('outgoing_id', $user_id)
                      ->orWhere('outgoing_id', $auth_id)
                      ->where('incoming_id',$auth_id)
                      ->orWhere('incoming_id',$user_id)
                      ->get();

        //$array = json_decode(json_encode($messages), true);
        //return count($messages);
        //dd($arr->toArray());
        return view('ajax.messages',[
            'arr' =>$arr,
        ])->with('user_id', $user_id)->render();
    }

}
