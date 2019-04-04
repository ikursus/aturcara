@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Peserta</div>

                <div class="card-body">

                    <p>
                        <a href="{{ route('peserta.create') }}" class="btn btn-primary">
                            Add Peserta
                        </a>
                    </p>
                    
                    <table class="table" id="pesertas-table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>PROGRAM</th>
                                <th>NAMA</th>
                                <th>JABATAN</th>
                                <th>JAWATAN</th>
                                <th>LOKASI</th>
                                <th>STATUS</th>
                                <th>VEGETERIAN</th>
                                <th>TINDAKAN</th>
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
$(function() {
    $('#pesertas-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('peserta.datatables') !!}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'program.name', name: 'program.name' },
            { data: 'nama', name: 'peserta.nama' },
            { data: 'jabatan', name: 'peserta.jabatan' },
            { data: 'jawatan', name: 'peserta.jawatan' },
            { data: 'email', name: 'peserta.email' },
            { data: 'status', name: 'peserta.status' },
            { data: 'is_vegeterian', name: 'peserta.is_vegeterian' },
            { data: 'tindakan', name: 'tindakan', orderable: false, searchable: false }
        ]
    });
});
</script>

@endsection