<?php

namespace App\Http\Livewire;

use App\Models\spp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SppPost extends Component
{
    public $tahun;
    public $nominal;
    public function render()
    {
        return view('livewire.spp-post');
    }
    protected $rules = [
        'tahun'=>'required|numeric|unique:spps|min:2018|max:3000',
        'nominal'=>'required|numeric|unique:spps|min:100000|max:2000000',
    ];
    protected $messages = [
        'tahun.required'=>'Tahun Wajib Diisi !!!',
        'tahun.numeric'=>'Tahun Harus Berupa Angka !!!',
        'tahun.unique'=>'Tahun Sudah Ada !!!',
        'tahun.min'=>'Minimal Tahun 2018',
        'tahun.max'=>'Maksimal Tahun 3000',
        'nominal.required'=>'Nominal Wajib Diisi !!!',
        'nominal.numeric'=>'Nominal Harus Berupa Angka !!!',
        'nominal.unique'=>'Nominal Sudah Ada !!!',
        'nominal.min'=>'Minimal Seratus Ribu',
        'nominal.max'=>'Maximal Dua Juta'
    ];
    public function SppPost()
    {
        $this->validate();
        spp::create([
            'tahun'=>$this->tahun,
            'nominal'=>$this->nominal,
            // 'nama_admin'=>Auth::user()->name,
        ]);
        $this->tahun = "";
        $this->nominal = "";
        $this->emit('post');
    }
}
