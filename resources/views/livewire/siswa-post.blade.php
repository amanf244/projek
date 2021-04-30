<table class="table table-striped table-inverse table-responsive">
  <thead class="thead-inverse">
      <tr>
        <th>No</th>
        <th>Nisn</th>
        <th>Nis</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>Kelas</th>
        <th>Spp</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>
          <input type="number" wire:model="nisn">
          @error('nisn') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
          <input type="number" wire:model="nis">
          @error('nis') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
          <input wire:model="nama">
          @error('nama') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
          <input wire:model="alamat">
          @error('alamat') <span class="error">{{ $message }}</span> @enderror</td>
        <td>
          <input type="number" wire:model="no_telp">
          @error('no_telp') <span class="error">{{ $message }}</span> @enderror</td>
        <td>
          <select wire:model="id_kelas">
        <option selected="selected" >Kelas</option>
        @foreach($data_siswa as $kelas)
        <option value="{{ $kelas->id_kelas}}">{{ $kelas->nama_kelas }}</option>
        @endforeach
    </select>
          @error('id_kelas') <span class="error">{{ $message }}</span> @enderror</td>
        <td>
          <select wire:model="id_spp">
            <option selected="selected" >spp</option>
            @foreach($spp as $spp)
            <option value="{{ $spp->id_spp }}">{{ $spp->tahun }}</option>
            @endforeach
          </select>
          @error('id_spp') <span class="error">{{ $message }}</span> @enderror</td>
        <td>
          <button wire:click="SiswaPost" class="btn btn-primary">Tambah</button></td>
      </tr>
    </tbody>
  </table>