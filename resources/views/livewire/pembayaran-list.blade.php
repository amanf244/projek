<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>No</th>
            <th>nisn</th>
            <th></th>
        </tr>
        </thead>
        @foreach ($data_pembayaran as $d)
            
       
        <tbody>
            <tr>
                <td scope="row"></td>
                <td>{{ $d->nisn }}</td>
                <td></td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
</table>