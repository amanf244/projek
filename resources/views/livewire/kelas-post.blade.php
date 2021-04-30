<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
      <tr>
        <th>No</th>
        <th>Nama Kelas</th>
        <th>Kompetensi Keahlian</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>
          <input type="text"  wire:model="nama_kelas">
          @error('nama_kelas') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
            <input type="text"  wire:model="kompetensi_keahlian">
          @error('kompetensi_keahlian') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
          <button wire:click="KelasPost" class="btn btn-primary">Tambah</button></td>
      </tr>
    </tbody>
  </table>