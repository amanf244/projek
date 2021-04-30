<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pembayaran extends Model
{
    protected $fillable = [
        'id_petugas',
        'nisn',
        'bulan_dibayar',
        'tahun_dibayar',
        'id_spp',
        'jumlah_bayar',
    ];
    protected $primaryKey = 'id_pembayaran';
    use HasFactory;
    public function detailsiswa($id)
    {
      return DB::table('siswas')
      ->leftjoin('spps','spps.id_spp','=','siswas.id_spp')
      ->where('id', $id)
      ->first();
    //   return redirect()->route('dashboard.pembayaran',[$id])->with('pesan', 'Data Berhasil di tambahkan !!!!');
    }
    public function detailpembayaran($id_pembayaran)
    {
        return DB::table('pembayarans')->where('id_pembayaran',$id_pembayaran)->first();
    }
    public function addData($data)
  {
    DB::table('pembayarans')->insert($data);
  }
  public function allData($id)
  {
      return DB::table('siswas')->leftJoin('pembayarans', 'pembayarans.nisn', '=', 'siswas.nisn')->where('id', $id)->get();
  }
  public function editdata($id_pembayaran,$data)
  {
      DB::table('pembayarans')
      ->where('id_pembayaran',$id_pembayaran)
      ->update($data);
  }
  public function deleteData($id_pembayaran)
  {
      DB::table('pembayarans')
      ->where('id_pembayaran',$id_pembayaran)
      ->delete();
  }
  public function pembayarandata($id_pembayaran)
  {
      return DB::table('pembayarans')
      ->where('id_pembayaran',$id_pembayaran)
      ->first();
  }
}
