<?php

namespace App\Http\Livewire;

use App\Models\kelas;
use App\Models\siswa;
use App\Models\spp;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SiswaList extends Component
{
    public $editId = 0;
    public $pembayaranId=0;
    public $nisn = 0;
    public $nis = 0;
    public $nama = 0;
    public $alamat = 0;
    public $no_telp = 0;
    public $id_spp = 0;
    public $id_kelas = 0;
    public $search = '';
    protected $listeners = [
        'post'=> '$refresh'
    ];
    protected $queryString =[
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];
    use WithPagination;
    public $page = 1;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        Paginator::useBootstrap();
        return view('livewire.siswa-list',[
            'data_siswa' => siswa::leftjoin('kelas','kelas.id_kelas','=','siswas.id_kelas')->rightjoin('spps','spps.id_spp','=','siswas.id_spp')->where('nama', 'like', '%'.$this->search.'%')->paginate(10),
            'data_kelas'=> kelas::all(),
            'data_spp'=> spp::all(),
        ]);
    }
    public function edit($postId)
    {
      $post = siswa::find($postId);
      $this->nisn = $post->nisn;
      $this->nis = $post->nis;
      $this->nama= $post->nama;
      $this->alamat = $post->alamat;
      $this->no_telp = $post->no_telp;
      $this->id_spp = $post->id_spp;
      $this->id_kelas = $post->id_kelas;

        $this-> editId = $postId;
    }
    public function update($postId)
    {
    $post = siswa::find($postId);
      $post->nisn = $this->nisn;
      $post->nis = $this->nis;
      $post->nama= $this->nama;
      $post->alamat = $this->alamat;
      $post->no_telp = $this->no_telp;
      $post->id_spp = $this->id_spp;
      $post->id_kelas = $this->id_kelas;
      $post->save();
      $this-> editId = 0;
    }
    public function delete($postId)
    {
       $post = siswa::find($postId);
       $post->delete();
    }
    public function updatingSearch()
    {
        $this->reset('search');
    }
    // public function detail($id)
    // {
    //   if (!$this->detail($id)) {
    //       abort(404, 'message');
    //   }
    //   $data = [
    //     'siswa'=>$this->detail($id),
    //   ];
    //   return view('livewire.pembayaran-post',$data);
    //
    // public function mount($postId)
    // {
    //   $this->id = $postId->id;
    // }
//     public function detailsiswa($id)
//   {
//     return DB::table('siswas')->where('id', $id)->first();
//   }

}
