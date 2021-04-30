<?php

namespace App\Http\Livewire;


use App\Models\kelas;
use App\Models\siswa;
use App\Models\spp;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PetugasSiswaList extends Component
{
    use WithPagination;
    public $page = 1;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        Paginator::useBootstrap();
        return view('livewire.petugas-siswa-list',[
            'data_siswa' => siswa::join('kelas','kelas.id_kelas','=','siswas.id_kelas')->join('spps','spps.id_spp','=','siswas.id_spp')->paginate(6)
            // 'data_kelas'=> kelas::all(),
            // 'data_spp'=> spp::all(),
        ]);
    }
}
