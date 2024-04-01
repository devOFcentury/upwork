<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Conversation extends Component
{
    use AuthorizesRequests;

    public $conversation;
    public $message;
    protected $listeners=['send' => '$refresh'];

    public function mount($conversation) 
    {
        $this->conversation = $conversation;
        $this->authorize('view', $conversation);
    }

    public function sendMessage() 
    {
        Message::create([
            'user_id' => auth()->user()->id,
            'conversation_id' => $this->conversation->id,
            'content' => $this->message,
        ]);

        $this->reset('message');
        $this->emit('send');
    }

    public function render()
    {
        return view('livewire.conversation');
    }
}
