<?php

namespace App\Http\Livewire;

use App\Models\pembayaran;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DataList extends Component
{
    public function render()
    {
        return view('livewire.data-list',[
            'data'=>pembayaran::get()->where('nisn',Auth::user()->nisn),
        ]);
    }
}
