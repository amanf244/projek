@extends('layouts.petugas_master')
@section('title','Dashboard')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
@section('konten')
<livewire:petugas-siswa-list>
{{-- <livewire:pembayaran-post> --}}
{{-- <table id="myTable" class="table table-sm table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Tes</th>
            <th>Tes</th>
            <th>Tes</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">Tes</td>
                <td>TEs</td>
                <td>TEs</td>
            </tr>
            <tr>
                <td scope="row">TEs</td>
                <td>TEs</td>
                <td>TEs</td>
            </tr>
        </tbody>
</table>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script> --}}
@endsection
