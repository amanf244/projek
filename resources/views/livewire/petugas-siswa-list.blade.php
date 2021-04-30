{{-- <input wire:model="search" placeholder="Search posts by title..."> --}}
{{-- <button onclick="location.href=''" type="button">
    www.example.com</button> --}}
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
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

                <th scope="row">{{ $no++ }}</th>

                <td>{{ $d->nisn }}</td>
                <td>{{ $d->nis }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->alamat }}</td>
                <td>{{ $d->no_telp }}</td>
                <td>{{ $d->nama_kelas }}</td>
                <td>{{ $d->tahun }}</td>
                {{-- <button class="btn btn-primary" wire:click="edit({{ $d->id }})">EDIT --}}

                  {{-- <a href="/dashboard/pembayaran/{{ $d->id }}">TES --}}
                    {{-- <button wire:click="mount({{ $d->id }})">TES</button> --}}

                <td>
                 <a href="/dashboard/petugas/pembayaran/{{ $d->id }}" class="btn btn-success">Spp</a>
                </td>

              </tr>
              @endforeach
            </tbody>
        </table>
        {{ $data_siswa->links() }}




