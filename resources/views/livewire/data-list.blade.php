<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>No</th>
            <th>Nisn</th>
            <th>Tgl Bayar</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Bayar</th>
            <th>Jumlah Bayar</th>
            <th>Tanda</th>
            <th>Nama Petugas</th>
        </tr>
        </thead>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $d)
        <tbody>
            <tr>
                <td scope="row">{{ $no++ }}</td>
                <td>{{ $d->nisn }}</td>
                <td>{{ \Carbon\Carbon::parse($d->tgl_bayar)->format('M d Y') }}</td>
                <td>{{ $d->bulan_dibayar }}</td>
                <td>{{ $d->tahun_dibayar }}</td>
                <td>{{ $d->id_spp }}</td>
                <td>{{ $d->jumlah_bayar }}</td>
                <td>{{ $d->tanda }}</td>
                <td>{{ $d->nama_petugas }}</td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
</table>
