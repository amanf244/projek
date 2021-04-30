<?php

namespace App\Http\Livewire;

use App\Models\petugas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PetugasList extends Component
{
    public $editId = 0;
    public $name = 0;
    public $email = 0;
    public $password = 0;
    protected $listeners = [
        'post'=> '$refresh'
    ];
    public function render()
    {
        return view('livewire.petugas-list',[
            'petugas'=>User::leftjoin('role_user','user_id','=','users.id')->where('role_id',2)->get(),
        ]);
    }
    public function edit($postId)
    {
        $post = User::find($postId);
        $this->name = $post->name;
        $this->email = $post->email;
        $this->password = $post->password;
        $this->editId = $postId;
    }
    public function update($postId)
    {
        $post = User::find($postId);
        $post->name = $this->name;
        $post->email = $this->email;
        $post->password =Hash::make($this->password);
        $post->save();
        $this->editId= 0;
    }
    public function delete($postId)
    {
        $post = User::find($postId);
        $post->delete();
    }
}
