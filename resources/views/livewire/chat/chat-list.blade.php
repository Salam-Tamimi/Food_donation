<div>

    <div class="chatlist_header">

        <div class="title">
            Chat
        </div>

        <div class="img_container">
            <img src="https://ui-avatars.com/api/?background=14bb9a&color=fff&name={{auth()->user()->name}}" alt="" class="imgg">
        </div>

    </div>

    <div class="chatlist_body">

        @if (count($conversation)> 0)
        @foreach ($conversation as $conv )

            <div class="chatlist_item" wire:key='{{ $conv->id }}' wire:click = "$emit('chatUserSelected', {{ $conv }}, {{ $this->getChatUserInstance($conv, $name = 'id') }})">

                <div class="chatlist_img_container">
                    <img src="https://ui-avatars.com/api/?name={{$this->getChatUserInstance($conv, $name = 'name')}}"
                            alt="" class="imgg">
                </div>

                <div class="chatlist_info">
                    <div class="top_row">
                        <div class="list_username">{{ $this->getChatUserInstance($conv, $name = 'name') }}
                            </div>
                            <span class="date">
                                {{ $conv->messages->last()?->created_at->shortAbsoluteDiffForHumans() }}</span>
                        </div>

                    <div class="bottom_row">
                        <div class="message_body text-truncate">
                            {{ $conv->messages->last()->body }}                        </div>
                        {{-- <div class="unread_count badge rounded-pill text-light bg-danger">
                            20
                        </div> --}}

                        @php

                            // Assuming $conv is the conversation object

                            $unreadMessages = $conv->messages
                                ->where('read', 0)
                                ->where('receiver_id', Auth()->user()->id)
                                ->where('sender_id', '!=', Auth()->user()->id);

                            if ($unreadMessages->count() > 0) {
                                echo '<div class="unread_count badge rounded-pill text-light bg-danger">' . $unreadMessages->count() . '</div>';

                                // Set the read status of the messages to 1 (read)
                                foreach ($unreadMessages as $message) {
                                    $message->read = 1;
                                    $message->save();
                                }
                            }

                        @endphp
                    </div>
                </div>

            </div>   
        @endforeach
        
        @else
            You have no conversations
        @endif

        

    </div>

</div>
