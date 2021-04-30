<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class siswa extends Model
{

      protected $fillable = [
        'nisn',
        'nis',
        'nama',
        'alamat',
        'no_telp',
        'id_spp',
        'id_kelas',
        'nama_admin',
    ];
    use HasFactory;
    public function detailsiswa($nisn)
  {
    return DB::table('siswas')->where('nisn', $nisn)->first();
  }
}
