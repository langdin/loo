<?php

namespace loo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use loo\Events\MessageSent;
use loo\Message;

class ChatsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Display Chats page
    */
    public function index()
    {
        return view('messages/index');
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
            'message' => $request->message
        ]);
        broadcast(new MessageSent(auth()->user(), $message->load('user')))->toOthers();

        return ['status' => 'Message Sent!', 'message'=> $message];
    }
}
