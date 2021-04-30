<?php

namespace App\Http\Livewire;

use App\Models\kelas;
use Livewire\Component;

class KelasPost extends Component
{
    public $nama_kelas;
    public $kompetensi_keahlian;
    public function render()
    {
        return view('livewire.kelas-post');
    }
    protected $rules = [
        'nama_kelas'=>'required|unique:kelas|min:3|max:10',
        'kompetensi_keahlian'=>'required|min:5|max:50',
    ];
    protected $messages = [
        'nama_kelas.required'=>'Nama Kelas Wajib Di ISI !!!',
        'nama_kelas.unique'=>'Nama Kelas Sudah Ada !!!',
        'nama_kelas.min'=>'Nama Kelas min 3 karakter !!!',
        'nama_kelas.max'=>'Nama Kelas max 10 karakter !!!',
        'kompetensi_keahlian.required'=>'Kompetensi Keahlian Wajib Di ISI !!!',
        'kompetensi_keahlian.min'=>'Kompetensi Keahlian Min 5 Karakter !!!',
        'kompetensi_keahlian.max'=>'Kompetensi Keahlian Max 50 Karakter !!!',
    ];
    public function KelasPost()
    {
        $this->validate();
        kelas::create([
            'nama_kelas'=>$this->nama_kelas,
            'kompetensi_keahlian'=>$this->kompetensi_keahlian,
            // 'nama_admin'=>Auth::user()->name,
        ]);
        $this->nama_kelas = "";
        $this->kompetensi_keahlian = "";
        $this->emit('post');
    }
}
