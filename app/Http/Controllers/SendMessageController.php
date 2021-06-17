<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Session;

class SendMessageController extends Controller
{
    public function sendMessage(Request $request){

            $message = $request->message;
            $incoming_id = $request->incoming_id;
            $outgoing_id = auth()->id();
            $msg = new Message;

            $data = $msg->create([
                'message' => $message,
                'incoming_id' => $incoming_id,
                'outgoing_id' => $outgoing_id,
                'status' => 'inactive',
            ]);

            if($data) return "yes";
            return "no";
    }
}
