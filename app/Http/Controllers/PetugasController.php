<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PetugasController extends Controller
{
    public function __construct() {
        $this->siswa = new pembayaran();
       }
       public function pembayaran($id)
       {
        if (!$this->siswa->detailsiswa($id)) {
                    //  abort(404, 'message');
                    return view('404');
                 }
         $data = [
           'd_siswa'=>$this->siswa->allData($id),
           'siswa'=>$this->siswa->detailsiswa($id),
         ];
         return view('petugas.pembayaran',$data);
       }
       public function tambahpembayaran($id)
       {
        if (!$this->siswa->detailsiswa($id)) {
            // abort(404, 'message');
            return view('404');
        }
         $data = [
        'siswa'=>$this->siswa->detailsiswa($id),
        ];
          return view('petugas.addpembayaran',$data);
       }
       public function insert($id)
  {
      Request()->validate([
          'nisn'=>'required|exists:siswas,nisn|min:8|max:11',
          'bulan_dibayar'=>'required|min:4|max:8',
          'tahun_dibayar'=>'required|min:2010|max:9999|numeric',
          'id_spp'=>'required|min:1|max:5000000|numeric|exists:spps,nominal',
          'tgl_bayar'=>'required|date',
      ],[
          'nisn.required'=>'NISN WAJIB DIISI !!!',
          'nisn.exists'=>'NISN TIDAK TERDAFTAR',
          'nisn.min'=>'NISN MINIMAL 8 KARAKTER',
          'nisn.max'=>'NISN MAXIMAL 11 KARAKTER',
          'bulan_dibayar.required'=>'BULAN HARUS DIISI',
          'bulan_dibayar.min'=>'BULAN MINIMAL 4 KARAKTER !!!',
          'bulan_dibayar.max'=>'BULAN MAXIMAL 8 KARAKTER !!!',
          'tahun_dibayar.required'=>'TAHUN HARUS DIISI',
          'tahun_dibayar.min'=>'TAHUN MINIMAL 2010',
          'tahun_dibayar.max'=>'TAHUN MAXIMAL 9999',
          'tahun_dibayar.numeric'=>'TAHUN HARUS DIISI',
      ]);
      if (request()->id_spp !== request()->jumlah_bayar) {
        $data = [
            'id_petugas'=>Auth::id(),
            'nisn'=>request()->nisn,
            'bulan_dibayar'=>request()->bulan_dibayar,
            'tahun_dibayar'=>request()->tahun_dibayar,
            'id_spp'=>request()->id_spp,
            'jumlah_bayar'=>request()->jumlah_bayar,
            'tgl_bayar'=>request()->tgl_bayar,
            'nama_petugas'=>Auth::user()->name,
            'tanda'=>'Belum'

        ];
      } else {
        $data = [
            'id_petugas'=>Auth::id(),
            'nisn'=>request()->nisn,
            'bulan_dibayar'=>request()->bulan_dibayar,
            'tahun_dibayar'=>request()->tahun_dibayar,
            'id_spp'=>request()->id_spp,
            'jumlah_bayar'=>request()->jumlah_bayar,
            'tgl_bayar'=>request()->tgl_bayar,
            'nama_petugas'=>Auth::user()->name,
            'tanda'=>'Lunas',

        ];
      }
    $this->siswa->addData($data);
    return redirect()->route('petugas.pembayaran',$id)->with('pesan', 'Data Berhasil di tambahkan !!!!');
  }
  public function edit($id_pembayaran,$id)
  {
    if (!$this->siswa->detailpembayaran($id_pembayaran)) {
        // abort(404, 'message');
        return view('404');
    }
    $data = [
      'siswa'=>$this->siswa->detailpembayaran($id_pembayaran),
      'user'=>$this->siswa->detailsiswa($id),
    ];
    return view('petugas.editpembayaran',$data);
  }
  public function update($id_pembayaran,$id)
  {
    if (request()->id_spp !== request()->jumlah_bayar) {
        $data = [
            'id_petugas'=>Auth::id(),
            'nisn'=>request()->nisn,
            'bulan_dibayar'=>request()->bulan_dibayar,
            'tahun_dibayar'=>request()->tahun_dibayar,
            'id_spp'=>request()->id_spp,
            'jumlah_bayar'=>request()->jumlah_bayar,
            'tgl_bayar'=>request()->tgl_bayar,
            'nama_petugas'=>Auth::user()->name,
            'tanda'=>'Belum'

        ];
      } else {
        $data = [
            'id_petugas'=>Auth::id(),
            'nisn'=>request()->nisn,
            'bulan_dibayar'=>request()->bulan_dibayar,
            'tahun_dibayar'=>request()->tahun_dibayar,
            'id_spp'=>request()->id_spp,
            'jumlah_bayar'=>request()->jumlah_bayar,
            'tgl_bayar'=>request()->tgl_bayar,
            'nama_petugas'=>Auth::user()->name,
            'tanda'=>'Lunas',

        ];
      }
    $this->siswa->editdata($id_pembayaran,$data);
    $this->siswa->detailsiswa($id);
    return redirect()->route('petugas.pembayaran',$id)->with('pesan', 'Data Berhasil di edit !!!!');
  }
  public function delete($id_pembayaran)
  {
      $this->siswa->deleteData($id_pembayaran);
      return Redirect::back()->with('pesan','Data Berhasil Di hapus');
  }
  public function print($id_pembayaran)
  {
      $data = [
          'pembayaran'=>$this->siswa->detailpembayaran($id_pembayaran)
      ];
      return view('admin.v_printpembayaran',$data);
  }
  public function pdf()
  {
      $data = [
          'pembayaran'=>$this->siswa->pembayaran()
      ];
      $pdf = view('admin.v_printpembayaran',$data);


$dompdf = new Dompdf();
$dompdf->loadHtml($pdf);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$options = $dompdf->getOptions();
$options->setIsHtml5ParserEnabled(true);
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('pembayaran.pdf');
  }
  public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("pembayarans")->whereIn('id_pembayaran',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
