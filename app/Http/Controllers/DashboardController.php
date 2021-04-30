<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\siswa;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
   public function index()
   {
       if(Auth::user()->hasRole('user')){
            return view('user.home');
       }elseif(Auth::user()->hasRole('petugas')){
            return view('petugas.home');
       }elseif(Auth::user()->hasRole('admin')){
        return view('admin.home');
   }
   }




   public function postcreate()
   {
    return view('postcreate');
   }
   public function user()
   {
       return view('admin.v_siswa');
   }
   public function spp()
   {
       return view('admin.v_spp');
   }
   public function kelas()
   {
       return view('admin.v_kelas');
   }
   public function petugas()
   {
       return view('admin.v_petugas');
   }
   public function siswa()
   {
       return view('admin.v_user');
   }
//    public function pembayarandetail($nisn)
//    {
//      if (!$this->siswa->detailsiswa($nisn)) {
//          abort(404, 'message');
//      }
//      $data = [
//        'siswa'=>$this->siswa->detailsiswa($nisn),
//      ];
//      return view('admin.v_pembayaran',$data);
//    }
public function data()
   {
       return view('user.data_transaksi');
   }
public function data_transaksi()
{
    return view('petugas.pembayaran_siswa');
}

}
