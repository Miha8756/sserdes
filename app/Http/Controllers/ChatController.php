<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PrivateMessage;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('chat.index', compact('users'));
    }

    public function show(User $user)
    {
        $messages = PrivateMessage::where(function($query) use ($user) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $user->id);
        })->orWhere(function($query) use ($user) {
            $query->where('sender_id', $user->id)
                  ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view('chat.show', compact('user', 'messages'));
    }

    public function send(Request $request, User $user)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $message = new PrivateMessage();
        $message->sender_id = Auth::id();
        $message->receiver_id = $user->id;
        $message->message = $request->message;
        $message->save();

        return redirect()->route('chat.show', $user);
    }
}
