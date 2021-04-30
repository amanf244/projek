<?php

namespace App\Http\Livewire;

use App\Models\pembayaran;
use App\Models\siswa;
use App\Models\spp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PembayaranPost extends Component
{
    public $nisn;
    public $bulan_dibayar;
    public $tahun_dibayar;
    public $id_spp;
    public $jumlah_bayar;
    public function render()
    {
        
        return view('livewire.pembayaran-post',[
            'data_spp'=>spp::all(),
            'data_siswa'=>siswa::where('nisn'),
        ]);
    }

    public function PembayaranPost()
    {
        // $this->validate();
        pembayaran::create([
            'id_petugas' =>Auth::id(),
            'nisn'=>$this->nisn,
            'bulan_dibayar'=>$this->bulan_dibayar,
            'tahun_dibayar'=>$this->tahun_dibayar,
            'id_spp'=>$this->id_spp,
            'jumlah_bayar'=>$this->jumlah_bayar,
        ]);
        $this->nisn="";
        $this->bulan_dibayar="";
        $this->tahun_dibayar="";
        $this->id_spp="";
        $this->jumlah_bayar="";
        $this->emit('post');
    }
    // public function mount($postId)
    // {
    //   $this->siswa = $postId->id;
    // }
    
}
