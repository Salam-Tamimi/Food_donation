@vite(['resources/css/app.css', 'resources/js/app.js']) 
@include('layouts.navigation')
<div>

    <div class="chat_container">
        
        <div class="chat_list_container">

            @livewire('chat.chat-list')
        </div>

        <div class="chat_box_container">

            @livewire('chat.chatbox')

            @livewire('chat.send-message')
        </div>

    </div>

    <script>
        window.addEventListener('chatSelected', event => {

            if (window.innerWidth < 768) {

                $('.chat_list_container').hide();
                $('.chat_box_container').show();

            }

            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);
            let height= $('.chatbox_body')[0].scrollHeight; 
            //alert(height);
                window.livewire.emit('updateHeight',{
                height:height,
            });
        });

    </script>

</div>
