@extends('layouts.petugas_master')
@section('title','data pembayaran')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('konten')
{{-- <livewire:pembayaran-post>
<livewire:pembayaran-list> --}}
<a href="/dashboard/petugas/pembayaran/add/{{ $siswa->id }}" class="btn btn-primary">+ Tambah Data</a>

{{-- <a href="/pembayaran/pdf" target="_blank" class="btn btn-primary btn-sm">Download PDF</a> --}}
<button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('myproductsDeleteAll') }}">Delete All Selected</button>
@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Sukses!</h5>
              {{ session('pesan') }}
</div>
@endif
<div class="card">
<div class="card-header">
  <h3 class="card-title">Projects</h3>

  <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
      <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
      <i class="fas fa-times"></i>
    </button>
  </div>
</div>
<div class="card-body p-0">
     <div id="btn-container"></div>
<table id="example" class="table table-striped table-inverse table-responsive">
<thead class="thead-inverse">
    <tr>
        <th width="50px"><input type="checkbox" id="master"></th>
        <th>No</th>
        <th>Nisn</th>
        <th>Tgl Bayar</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Bayar</th>
        <th>Jumlah Bayar</th>
        <th>Tanda</th>
        <th>Aksi</th>
        <th>Print</th>
    </tr>
    </thead>
    <tfoot>
        <tr>
            <th width="50px"><input type="checkbox" id="master"></th>
            <th>No</th>
            <th>Nisn</th>
            <th>Tgl Bayar</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Bayar</th>
            <th>Jumlah Bayar</th>
            <th>Tanda</th>
            <th>Aksi</th>
            <th>Print</th>
        </tr>
    </tfoot>


    <tbody>
        @php
        $no = 1;
    @endphp
    @foreach ($d_siswa as $aman)
    @if ($aman->id_pembayaran > 0)
        <tr>
            <td><input type="checkbox" class="sub_chk" data-id="{{$aman->id_pembayaran}}"></td>
            <td scope="row">{{ $no++ }}</td>
            <td>{{ $aman->nisn }}</td>
            <td>{{ $aman->tgl_bayar }}</td>
            <td>{{ $aman->bulan_dibayar }}</td>
            <td>{{ $aman->tahun_dibayar }}</td>
            <td>{{ $aman->id_spp }}</td>
            <td>{{ $aman->jumlah_bayar }}</td>
            <td>{{ $aman->tanda }}</td>
            <td>
                {{-- <a href="/dashboard/pembayaran/edit/{{ $aman->id_pembayaran }}" class="btn btn-primary">Edit</a> --}}
            <a class="btn btn-info btn-sm" href="/dashboard/petugas/pembayaran/edit/{{ $aman->id_pembayaran }}/{{ $siswa->id }}">
            <i class="fas fa-pencil-alt"></i>Edit</a>
             <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $aman->id_pembayaran }}">
                <i class="fas fa-trash">
                </i>
                Hapus
      </button></td>
      <td><a href="/pembayaran/print/{{ $aman->id_pembayaran }}" target="_blank" class="btn btn-info btn-sm">Print</a></td>
        </tr>

        @else
            data kosong
        @endif
        @endforeach
    </tbody>
</table>

@foreach ($d_siswa as $hapus)
<div class="modal fade" id="delete{{ $hapus->id_pembayaran }}">
<div class="modal-dialog modal-sm">
  <div class="modal-content bg-danger">
    <div class="modal-header">
      <h4 class="modal-title">Hapus Data Pembayaran: {{ $hapus->nisn }}</h4>
      <button type="button" class="close" siswa-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Klik hapus untuk menghapus&hellip;</p>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-outline-light" data-dismiss="modal">BATAL</button>
      <button onclick="window.location.href='/dashboard/petugas/pembayaran/delete/{{ $hapus->id_pembayaran }}'" class="btn btn-outline-light">SIMPAN</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>

@endforeach
<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'print',
            autoPrint: false,
            text: 'Print',
            exportOptions: {
              rows: function ( idx, data, node ) {
                var dt = new $.fn.dataTable.Api('#example' );
                var selected = dt.rows( { selected: true } ).indexes().toArray();

                if( selected.length === 0 || $.inArray(idx, selected) !== -1)
                  return true;


                return false;
            }
          }
        }
    ],
    select: true
} );
} );
</script>
<script type="text/javascript">
$(document).ready(function () {


    $('#master').on('click', function(e) {
     if($(this).is(':checked',true))
     {
        $(".sub_chk").prop('checked', true);
     } else {
        $(".sub_chk").prop('checked',false);
     }
    });


    $('.delete_all').on('click', function(e) {


        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });


        if(allVals.length <=0)
        {
            alert("Please select row.");
        }  else {


            var check = confirm("Are you sure you want to delete this row?");
            if(check == true){


                var join_selected_values = allVals.join(",");


                $.ajax({
                    url: $(this).data('url'),
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: 'ids='+join_selected_values,
                    success: function (data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });


              $.each(allVals, function( index, value ) {
                  $('table tr').filter("[data-row-id='" + value + "']").remove();
              });
            }
        }
    });


    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        onConfirm: function (event, element) {
            element.trigger('confirm');
        }
    });


    $(document).on('confirm', function (e) {
        var ele = e.target;
        e.preventDefault();


        $.ajax({
            url: ele.href,
            type: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                if (data['success']) {
                    $("#" + data['tr']).slideUp("slow");
                    alert(data['success']);
                } else if (data['error']) {
                    alert(data['error']);
                } else {
                    alert('Whoops Something went wrong!!');
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });


        return false;
    });
});
@endsection
