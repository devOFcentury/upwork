<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Carbon\Carbon;

use Illuminate\Http\Request;
use function Termwind\render;

class ConversationController extends Controller
{
    public function index() 
    {
        /** @var \App\Models\User $user **/
        $user = auth()->user();
        $conversations = $user->conversations()->latest()->get();

        return view('conversations.index', compact('conversations'));
    }

    public function show(Conversation $conversation) 
    {
        return view('conversations.show', compact('conversation'));
    }
}
