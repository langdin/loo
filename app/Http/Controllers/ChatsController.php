<?php

namespace loo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use loo\Message;

class ChatsController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }

    /**
    * Fetch all messages
    *
    * @return Message
    */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    /**
    * Persist message to database
    *
    * @param  Request $request
    * @return Response
    */
    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->input('message')
        ]);

        return ['status' => 'Message Sent!'];
    }
}
