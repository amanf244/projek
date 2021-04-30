<?php

namespace App\Http\Livewire;

use App\Models\chat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatPost extends Component
{
    public $isi;
    public function render()
    {
        return view('livewire.chat-post');
    }
    public function ChatPost()
    {
        chat::create([
            'user_id' =>Auth::id(),
            'nama_admin' =>Auth::user()->name,
            'isi' =>$this->isi,
        ]);
        $this->isi= "";
        $this->emit('posted');
    }
}
