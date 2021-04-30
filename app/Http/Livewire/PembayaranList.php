<?php

namespace App\Http\Livewire;

use App\Models\pembayaran;
use Livewire\Component;

class PembayaranList extends Component
{
    
    public function render()
    {
        return view('livewire.pembayaran-list',[
            'data_pembayaran'=>pembayaran::where('id_pembayaran')->get()
        ]);
    }
}
