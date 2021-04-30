<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
          <th>No</th>
          <th>Nisn</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Password</th>
          <th>{{ $siswa->id }}</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>
            <input wire:model="nisn">
            @error('nisn') <span class="error">{{ $message }}</span> @enderror
          </td>
          <td>
            <input wire:model="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
          </td>
          <td>
            <input type="email" wire:model="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
          </td>
          <td>
            <input wire:model="password">
            @error('password') <span class="error">{{ $message }}</span> @enderror
          </td>
          <td>
            <button wire:click="PetugasPost" class="btn btn-primary">Tambah</button></td>
        </tr>
      </tbody>
    </table>
