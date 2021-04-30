<table class="table table-striped table-inverse table-responsive">
  <thead class="thead-inverse">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tahun</th>
        <th scope="col">Nominal</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>
          <input type="number" class="form-control" wire:model="tahun">
          @error('tahun') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
            <input type="number" class="form-control" wire:model="nominal">
          @error('nominal') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
          <button wire:click="SppPost" class="btn btn-primary">Tambah</button></td>
      </tr>
    </tbody>
  </table>
  