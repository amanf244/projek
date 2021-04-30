<?php

namespace App\Http\Livewire;

use App\Models\spp;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class SppList extends Component
{
    public $editId;
    public $tahun;
    public $nominal;
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
        return view('livewire.spp-list',[
            'data_spp'=>spp::where('tahun', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }
    public function edit($id_spp)
    {
      $post = spp::find($id_spp);
      $this->tahun = $post->tahun;
      $this->nominal = $post->nominal;
    
        $this-> editId = $id_spp;
    }
    public function update($id_spp)
    {
    $post = spp::find($id_spp);
      $post->tahun = $this->tahun;
      $post->nominal = $this->nominal;
      $post->save();
      $this-> editId = 0;
    }
    public function delete($id_spp)
    {
       $post = spp::find($id_spp);
       $post->delete();
    }
}
