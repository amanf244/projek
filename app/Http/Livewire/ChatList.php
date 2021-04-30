<?php

namespace App\Http\Livewire;

use App\Models\chat;
use Livewire\Component;

class ChatList extends Component
{
    protected $listeners = [
        'posted'=> '$refresh'
    ];
    public function render()
    {
        return view('livewire.chat-list',[
            'chats'=>chat::join('users','users.id','=','chats.user_id')->select('users.foto_admin','chats.created_at','users.name','chats.isi')->get(),
        ]);
    }
}
