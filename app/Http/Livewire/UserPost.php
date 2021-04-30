<?php

namespace App\Http\Livewire;

use App\Models\petugas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserPost extends Component
{
    public $nisn;
    public $name;
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.user-post',[
            'siswa'=>User::get()->where('id')->last()
        ]);
    }
    protected $rules = [
        'nisn'=>'required|numeric|min:99999999|exists:siswas,nisn|unique:users,nisn|max:9999999999',
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required',
    ];
    protected $messages = [
        'name.required'=>'Nama Wajib Diisi',
        'nisn.required'=>'Nisn Wajib Diisi',
        'nisn.numeric'=>'Nisn Harus Berupa Nomor',
        'nisn.min'=>'Nisn Minimal 8 angka',
        'nisn.max'=>'Nisn Minimal berbentuk 10 nomor',
        'nisn.exists'=>'Nisn Tidak Terdftar',
        'nisn.unique'=>'User dengan Nisn ini sudah ada',
    ];
    public function PetugasPost()
    {
        $this->validate();

        User::create([
            'name'=>$this->name,
            'nisn'=>$this->nisn,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),

        ]);
        $id_user = User::get()->where('id')->last();
        petugas::create([
            'role_id'=>3,
            'user_id'=>$id_user->id,
            'user_type'=>"App\Models\User",
        ]);
        $this->name="";
        $this->nisn="";
        $this->email="";
        $this->password="";
        $this->emit('post');


    }
}
