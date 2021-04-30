@extends('layouts.petugas_master')
@section('title', 'Tambah Data')
@section('konten')
<form action="/dashboard/petugas/pembayaran/update/{{ $siswa->id_pembayaran }}/{{ $user->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
      <div class="row-sm">
        <div class="col-sm-6">
          <div class="form-group">
            <label>NISN</label>
            <input name="nisn" class="form-control" value="{{ $siswa->nisn }}">
            <div class="text-danger">
      @error ('nisn')
          {{ $message }}
      @enderror
    </div>
          </div>

          <div class="form-group">
            <label>BULAN DIBAYAR</label>
            <input name="bulan_dibayar" class="form-control" value="{{ $siswa->bulan_dibayar }}">
              <div class="text-danger">
        @error ('bulan_dibayar')
            {{ $message }}
        @enderror
      </div>
          </div>
          <div class="form-group">
            <label>TAHUN DIBAYAR</label>
            <input name="tahun_dibayar" class="form-control" value="{{ $siswa->tahun_dibayar }}">
              <div class="text-danger">
        @error ('tahun_dibayar')
            {{ $message }}
        @enderror
      </div>
          </div>
          <div class="form-group">
            <label>NOMINAL</label>
            <input name="id_spp" class="form-control" value="{{ $siswa->id_spp }}" readonly>
              <div class="text-danger">
        @error ('id_spp')
            {{ $message }}
        @enderror
      </div>
          </div>
          <div class="form-group">
            <label>JUMLAH BAYAR</label>
            <input name="jumlah_bayar" class="form-control" value="{{ $siswa->jumlah_bayar }}">
              <div class="text-danger">
        @error ('jumlah_bayar')
            {{ $message }}
        @enderror
      </div>
          </div>
          <div class="form-group">
            <label>TANGGAL BAYAR</label>
            <input name="tgl_bayar" type="datetime-local" class="form-control" value="{{ $siswa->tgl_bayar }}">
              <div class="text-danger">
        @error ('tgl_bayar')
            {{ $message }}
        @enderror
      </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-sm">SIMPAN</button>
          </div>

        </div>
      </div>
    </div>
  </form>
@endsection
