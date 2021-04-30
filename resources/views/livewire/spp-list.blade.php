{{-- <button wire:click="$emit('search')">
<input wire:model="search" type="search" placeholder="Search posts by title..."> --}}
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
      <tr>
        <th>Aksi</th>
        <th>No</th>
        <th>Tahun</th>
        <th>Nominal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    @php
        $no = 1;
    @endphp
    @foreach ($data_spp as $d)
    <tbody>
        <tr>
          <td>
            
              <div class = col-l>
              @if ($editId !== $d->id_spp)
              <button class="btn btn-primary" wire:click="edit({{ $d->id_spp }})">EDIT
              </button>
              @else
              <button wire:click="update({{ $d->id_spp }})" class="btn btn-danger">Oke</button>
        @endif
      </div>
            
          </td>
          <th scope="row">{{ $no++ }}</th>
          @if ($editId !== $d->id_spp)
          <td>{{ $d->tahun}}</td>
          <td>{{ $d->nominal }}</td>
          @else
          <td><input wire:model="tahun" class="form-control" type="text" name=""></td>
          <td><input wire:model="nominal" class="form-control" type="text" name=""></td>
          @endif
          <td>
            <button wire:click="delete({{ $d->id_spp }})" class="btn btn-danger">Hapus</button>
          </td>
          
        </tr>
        @endforeach
      </tbody>
  </table>
  {{ $data_spp->links() }}




 