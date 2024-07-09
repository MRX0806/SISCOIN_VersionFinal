<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;

class ConversationController extends Controller
{
    /**
     * Display a listing of the conversations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversations = Conversation::where('user_one', auth()->id())
            ->orWhere('user_two', auth()->id())
            ->get();

        return response()->json($conversations);
    }

    /**
     * Store a newly created conversation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_one' => 'required|exists:users,id',
            'user_two' => 'required|exists:users,id'
        ]);

        $conversation = Conversation::where(function($query) use ($request) {
            $query->where('user_one', $request->user_one)
                  ->where('user_two', $request->user_two);
        })->orWhere(function($query) use ($request) {
            $query->where('user_one', $request->user_two)
                  ->where('user_two', $request->user_one);
        })->first();

        if ($conversation) {
            return response()->json($conversation);
        }

        $conversation = new Conversation();
        $conversation->user_one = $request->user_one;
        $conversation->user_two = $request->user_two;
        $conversation->save();

        return response()->json($conversation);
    }

    /**
     * Display the specified conversation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conversation = Conversation::findOrFail($id);

        if ($conversation->user_one != auth()->id() && $conversation->user_two != auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($conversation);
    }
}

