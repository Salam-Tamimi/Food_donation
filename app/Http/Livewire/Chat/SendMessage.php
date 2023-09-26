<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class SendMessage extends Component
{
    public $selectedConversation;
    public $receiverInstance;
    public $body;
    public $createdMessage;

    protected $listeners = ['updateSendMessage', 'dispatchMessageSent', 'resetComponent'];

    public function resetComponent()
    {
        $this->selectedConversation= null;
        $this->receiverInstance= null;
        // dd('reset');
    }

    function updateSendMessage(Conversation $conversation, User $receiver)
    {

        // dd($conversation,$receiver);
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
    }

    public function sendMessage()
    {
        // dd($this->body);
        if ($this->body == null) {
            return null;
        }

        //Save the Message into database
        $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body,
        ]);

        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
        $this->selectedConversation->save();
        $this->emitTo('chat.chatbox', 'pushMessage', $this->createdMessage->id);


        //reshresh coversation list 
        $this->emitTo('chat.chat-list', 'refresh');
        $this->reset('body');

        $this->emitSelf('dispatchMessageSent');
        // dd($this->body);
        
    }

    public function dispatchMessageSent()
    {
        broadcast(new MessageSent(Auth()->user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance));
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
