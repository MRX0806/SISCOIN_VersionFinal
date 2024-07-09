<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Conversation;
use App\Events\MessageSent;

class MessageController extends Controller
{
    /**
     * Display a listing of the messages for a conversation.
     *
     * @param  int  $conversationId
     * @return \Illuminate\Http\Response
     */
    public function index($conversationId)
    {
        $messages = Message::where('conversation_id', $conversationId)->get();

        return response()->json($messages);
    }

    /**
     * Store a newly created message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $conversationId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $conversationId)
    {
        $request->validate([
            'sender_id' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);

        $message = new Message();
        $message->conversation_id = $conversationId;
        $message->sender_id = $request->sender_id;
        $message->message = $request->message;
        $message->save();

        return response()->json($message);
    }
}

