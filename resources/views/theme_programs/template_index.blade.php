@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Program</div>

                <div class="card-body">

                    <p>
                        <a href="{{ route('programs.create') }}" class="btn btn-primary">
                            Add Program
                        </a>
                    </p>
                    
                    <table class="table" id="programs-table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>NAMA</th>
                                <th>TARIKH MULA</th>
                                <th>TARIKH TAMAT</th>
                                <th>LOKASI</th>
                                <th>JUMLAH PESERTA</th>
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
    $('#programs-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('programs.datatables') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'tarikh_mula', name: 'tarikh_mula' },
            { data: 'tarikh_akhir', name: 'tarikh_akhir' },
            { data: 'lokasi', name: 'lokasi' },
            { data: 'jumlah_peserta', name: 'jumlah_peserta' },
            { data: 'tindakan', name: 'tindakan' }
        ]
    });
});
</script>

@endsection