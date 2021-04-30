<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nisn</th>
        <th scope="col">Bulan</th>
        <th scope="col">Tahun</th>
        <th scope="col">Bayar</th>
        <th scope="col">Jumlah Bayar</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>
          <input type="number" class="form-control" wire:model="nisn">
          @error('nisn') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
          <input type="text" class="form-control" wire:model="bulan_dibayar">
          @error('bulan_dibayar') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
          <input class="form-control" wire:model="tahun_dibayar">
          @error('tahun_dibayar') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
            <select wire:model="id_spp">
              <option selected="selected" >spp</option>
              @foreach($data_spp as $spp)
              <option value="{{ $spp->id_spp }}">{{ $spp->nominal }}</option>
              @endforeach
            </select>
            @error('id_spp') <span class="error">{{ $message }}</span> @enderror</td>

        <td>
          <input class="form-control" wire:model="jumlah_bayar">
          @error('jumlah_bayar') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
          <button wire:click="PembayaranPost" class="btn btn-primary">Tambah</button></td>
      </tr>
    </tbody>
  </table>
