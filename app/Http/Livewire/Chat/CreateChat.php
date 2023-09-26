<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class CreateChat extends Component
{

    public $users;

    public $message = 'Hello how are you ?';

    public function checkConverstion($receiverId)
    {
        // dd($receiverId);
        $checkedConverstion = Conversation::where('receiver_id', auth()->user()->id)->where('sender_id', $receiverId)->orWhere('receiver_id', $receiverId)->where('sender_id',auth()->user()->id)->get();

        if(count($checkedConverstion) == 0){
            // dd('No Conversation');
            $createdConverstion = Conversation::create([
                'receiver_id' => $receiverId,
                'sender_id' => auth()->user()->id,
                // 'last_time_message' => 0

            ]);//Conversation Created

            $createdMessage = Message::create([
                'conversation_id' => $createdConverstion->id,
                'sender_id' => auth()->user()->id,
                'receiver_id' => $receiverId,
                'body' => $this->message
            ]);

            foreach ($checkedConverstion as $conversation) {
                $conversation->last_time_message = $createdMessage->created_at;
                $conversation->save();
            }

            return redirect()->route('chat');
            // dd($createdMessage);
            // dd('Saved');
        }
        else if(count($checkedConverstion) >= 1){
            return redirect()->route('chat');
            // dd('Conversation  exists');
        }
    }
    public function render()
    {
        $this->users = User::where('id', '!=', auth()->user()->id)->get();
        return view('livewire.chat.create-chat');
    }
}
