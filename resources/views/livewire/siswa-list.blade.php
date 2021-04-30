{{-- <input wire:model="search" placeholder="Search posts by title..."> --}}
{{-- <button onclick="location.href=''" type="button">
    www.example.com</button> --}}
<table class="table table-striped table-inverse table-responsive">
  <thead class="thead-inverse">
      <tr>
        <th>Aksi</th>
        <th>No</th>
        <th>Nisn</th>
        <th>Nis</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No telp</th>
        <th>kelas</th>
        <th>Spp</th>
        <th>Aksi</th>
      </tr>
    </thead>
    @php
        $no = 1;
    @endphp
    @foreach ($data_siswa as $d)
    <tbody>
        <tr>
          <td>

            {{-- </button>
              <div class = col-l>
              @if ($editId === $d->id)
              <label for="">NISN</label>
            <input wire:model="nisn" class="form-control" type="text" name="">
            <label for="">NIS</label>
            <input wire:model="nis" class="form-control" type="text" name="">
            <label for="">Nama</label>
            <input wire:model="nama" class="form-control" type="text" name="">
            <label for="">Alamat</label>
            <input wire:model="alamat" class="form-control" type="text" name="">
            <label for="">No Telp</label>
            <input wire:model="no_telp" class="form-control" type="text" name="">
            <label for="">Kelas</label><br>
            <select wire:model="id_kelas">
              <option selected="selected" >Kelas</option>
              @foreach($kelas as $kelas)
              <option value="{{ $kelas->id_kelas }}">{{ $d->nama_kelas }}</option>
              @endforeach
          </select>
          <br> --}}
          @if ($editId !== $d->id)
          <button class="btn btn-primary" wire:click="edit({{ $d->id }})">EDIT</button>
          @else
          <button wire:click="update({{ $d->id }})" class="btn btn-danger">Oke</button>
          @endif


        {{-- @endif --}}
      </div>

          </td>

          <th scope="row">{{ $no++ }}</th>
          @if ($editId !== $d->id)
          <td>{{ $d->nisn }}</td>
          <td>{{ $d->nis }}</td>
          <td>{{ $d->nama }}</td>
          <td>{{ $d->alamat }}</td>
          <td>{{ $d->no_telp }}</td>
          <td>{{ $d->nama_kelas }}</td>
          <td>{{ $d->tahun }}</td>
          {{-- <button class="btn btn-primary" wire:click="edit({{ $d->id }})">EDIT --}}
          @else
          <td><input wire:model="nisn"  type="text" name=""></td>
          <td><input wire:model="nis"  type="text" name=""></td>
          <td><input wire:model="nama"  type="text" name=""></td>
          <td><input wire:model="alamat"  type="text" name=""></td>
          <td><input wire:model="no_telp"  type="text" name=""></td>
          <td><select wire:model="id_kelas">
            <option selected="selected" >Kelas</option>
            @foreach($data_kelas as $data_kelas)
            <option value="{{ $data_kelas->id_kelas }}">{{ $data_kelas->nama_kelas }}</option>
            @endforeach
        </select>
        <td>
          <select wire:model="id_spp">
            <option selected="selected" >Spp</option>
            @foreach($data_spp as $data_spp)
            <option value="{{ $data_spp->id_spp }}">{{ $data_spp->tahun }}</option>
            @endforeach
        </select>
        </td>
      </td>
          @endif

            {{-- <a href="/dashboard/pembayaran/{{ $d->id }}">TES --}}
              {{-- <button wire:click="mount({{ $d->id }})">TES</button> --}}

          <td>
            <button wire:click="delete({{ $d->id }})" class="btn btn-danger">Hapus</button>
           <a href="/dashboard/pembayaran/{{ $d->id }}" class="btn btn-success">Spp</a>
          </td>

        </tr>
        @endforeach
      </tbody>
  </table>
  {{ $data_siswa->links() }}




