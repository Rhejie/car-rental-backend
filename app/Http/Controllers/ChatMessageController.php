<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{

    public function sendMessage(Request $request)
    {
        $message = [
            "id" => $request->userid,
            "sourceuserid" => auth()->user()->id,
            "name" => auth()->user()->name,
            "message" => $request->message
        ];
        event(new ChatMessage($message));
        return "true";
    }
}
