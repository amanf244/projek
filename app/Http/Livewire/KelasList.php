<?php

namespace App\Http\Livewire;

use App\Models\kelas;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class KelasList extends Component
{
    public $editId = 0;
    public $nama_kelas = 0;
    public $kompetensi_keahlian = 0;
    protected $listeners = [
        'post'=> '$refresh'
    ];
    use WithPagination;
    public $search = '';
    protected $queryString =[
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];
    public $page = 1;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        Paginator::useBootstrap();
        return view('livewire.kelas-list',[
            'data_kelas'=>kelas::where('nama_kelas', 'like', '%'.$this->search.'%')->paginate(5),
        ]);
    }
    // public function edit($postId)
    // {
    // $this->updateMode = true;
    //   $post =  kelas::where('id_kelas',$postId)->first();
    //   $this->nama_kelas = $post->nama_kelas;
    //   $this->kompetensi_keahlian = $post->kompetensi_keahlian;

    //     $this-> editId = $postId;
    // }
    public function edit($postId)
    {
      $post = kelas::find($postId);
      $this->nama_kelas = $post->nama_kelas;
      $this->kompetensi_keahlian = $post->kompetensi_keahlian;

        $this-> editId = $postId;
    }
    public function update($id_siswa)
    {
    $post = kelas::find($id_siswa);
      $post->nama_kelas = $this->nama_kelas;
      $post->kompetensi_keahlian = $this->kompetensi_keahlian;
      $post->save();
      $this-> editId = 0;
    }
    // public function delete($postId)
    // {
    //     if($postId){
    //         kelas::where('id_kelas',$postId)->delete();
    //         session()->flash('message', 'Users Deleted Successfully.');
    //     }
    // }
    public function delete($id_kelas)
    {
       $post = kelas::find($id_kelas);
       $post->delete();
    }
}
