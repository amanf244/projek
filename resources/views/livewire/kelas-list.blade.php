{{-- <button wire:click="$emit('search')">
<input wire:model="search" type="search" placeholder="Search posts by title..."> --}}
{{-- @if (session()->has('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif --}}
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
      <tr>
        <th>Aksi</th>
        <th>No</th>
        <th>Nama Kelas</th>
        <th>Kompetensi Keahlian</th>
        <th>Aksi</th>
      </tr>
    </thead>
    @php
        $no = 1;
    @endphp
    @foreach ($data_kelas as $d)
    <tbody>
        <tr>
          <td>
              @if ($editId !== $d->id_kelas)
              <button class="btn btn-primary" wire:click="edit({{ $d->id_kelas }})">EDIT
              </button>
              @else
              <button wire:click="update({{ $d->id_kelas }})" class="btn btn-danger">Oke</button>
        @endif
      </div>

          </td>
          <th scope="row">{{ $no++ }}</th>
          @if ($editId !== $d->id_kelas)
          <td>{{ $d->nama_kelas}}</td>
          <td>{{ $d->kompetensi_keahlian }}</td>
          @else
          <td><input wire:model="nama_kelas" type="text" name=""></td>
          <td><input wire:model="kompetensi_keahlian" type="text" name=""></td>
          @endif
          <td>
            <button wire:click="delete({{ $d->id_kelas }})" class="btn btn-danger">Hapus</button>
          </td>

        </tr>
        @endforeach
      </tbody>
  </table>
  {{ $data_kelas->links() }}




