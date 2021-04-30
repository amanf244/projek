<?php

namespace App\Http\Livewire;

use App\Models\petugas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PetugasPost extends Component
{
    public $name;
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.petugas-post',[
            'siswa'=>User::get()->where('id')->last()
        ]);
    }
    protected $rules = [
        'name'=>'required',
        'email'=>'required',
        'password'=>'required',
    ];
    public function PetugasPost()
    {
        $this->validate();
        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),

        ]);
        $id_user = User::get()->where('id')->last();
        petugas::create([
            'role_id'=>2,
            'user_id'=>$id_user->id,
            'user_type'=>"App\Models\User",
        ]);
        $this->name="";
        $this->email="";
        $this->password="";
        $this->emit('post');


    }
}
