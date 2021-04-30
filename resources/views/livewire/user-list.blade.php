{{-- <input wire:model="search" placeholder="Search posts by title..."> --}}
{{-- <button onclick="location.href=''" type="button">
    www.example.com</button> --}}
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
              <th>Aksi</th>
              <th>No</th>
              <th>Nisn</th>
              <th>Nama</th>
              <th>email</th>
              <th>password</th>
              <th>Aksi</th>
            </tr>
          </thead>
          @php
              $no = 1;
          @endphp
          @foreach ($petugas as $d)
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
                {{-- @if ($editId !== $d->id)
                <button class="btn btn-primary" wire:click="edit({{ $d->id }})">EDIT</button>
                @else
                <button wire:click="update({{ $d->id }})" class="btn btn-danger">Oke</button>
                @endif --}}


              {{-- @endif --}}
              @if ($editId !== $d->id)
              <button class="btn btn-primary" wire:click="edit({{ $d->id }})">EDIT</button>
              @else
              <button wire:click="update({{ $d->id }})" class="btn btn-danger">Oke</button>
              @endif
            </div>

                </td>

                <th scope="row">{{ $no++ }}</th>
                @if ($editId!==$d->id)
                <td>{{ $d->nisn }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->email }}</td>
                <td><input class="form-control" type="password" value="{{ $d->password }}" name="" disabled></td>
                @else
                <td><input class="form-control" type="text" wire:model="nisn" name=""></td>
                <td><input class="form-control" type="text" wire:model="name" name=""></td>
                <td><input class="form-control" type="email" wire:model="email" name=""></td>
                <td><input class="form-control" type="password" wire:model="password" name=""></td>
                @endif
                {{-- <button class="btn btn-primary" wire:click="edit({{ $d->id }})">EDIT --}}




                  {{-- <a href="/dashboard/pembayaran/{{ $d->id }}">TES --}}
                    {{-- <button wire:click="mount({{ $d->id }})">TES</button> --}}

                <td>
                  <button wire:click="delete({{ $d->id }})" class="btn btn-danger">Hapus</button>
                </td>

              </tr>
              @endforeach
            </tbody>
        </table>





