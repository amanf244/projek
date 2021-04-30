<?php

namespace App\Http\Livewire;

use App\Models\kelas;
use App\Models\siswa;
use App\Models\spp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SiswaPost extends Component
{
    public $nisn;
    public $nis;
    public $nama;
    public $alamat;
    public $no_telp;
    public $id_spp;
    public $id_kelas;
    public function render()
    {

        return view('livewire.siswa-post',[
            'data_siswa'=>kelas::all(),
            'spp'=>spp::all(),
        ]);
    }
    protected $rules = [
        'nisn'=>'required|min:8|unique:siswas|max:11',
        'nis'=>'required|unique:siswas|min:4|max:8',
        'nama'=>'required',
        'alamat'=>'required',
        'no_telp'=>'required',
        'id_spp'=>'required',
        'id_kelas'=>'required',
    ];
    protected $messages = [
        'nisn.required' => 'Nisn harus diisi !!!',
        'nisn.unique'=>'Nisn sudah Ada !!!',
        'nisn.min'=>'minimal 8 angka !!!',
        'nis.required'=>'Nis Harus Diisi !!!',
        'nis.unique'=>'Nis Sudah Ada !!!',
        'nama.required'=>'Nama Harus Diisi !!!',
        'alamat.required'=>'Alamat Harus Diisi !!!',
        'no_telp.required'=>'Nomor Telepon Harus Diisi',
        'id_spp.required'=>'Spp Harus Diisi !!!',
        'id_kelas.required'=>'Kelas Harus Diisi !!!',
    ];
    public function SiswaPost()
    {
        $this->validate();
        siswa::create([
            'nisn'=>$this->nisn,
            'nis'=>$this->nis,
            'nama'=>$this->nama,
            'alamat'=>$this->alamat,
            'no_telp'=>$this->no_telp,
            'id_spp'=>$this->id_spp,
            'id_kelas'=>$this->id_kelas,
            'nama_admin'=>Auth::user()->name,
        ]);
        $this->nisn="";
        $this->nis="";
        $this->nama="";
        $this->alamat="";
        $this->no_telp="";
        $this->id_spp="";
        $this->id_kelas="";
        $this->emit('post');
    }
}
