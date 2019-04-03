@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Users</div>

                <div class="card-body">

                    <p>
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            Add User
                        </a>
                    </p>
                    
                    <table class="table" id="users-table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>NAMA</th>
                                <th>EMAIL</th>
                                <th>JABATAN</th>
                                <th>JAWATAN</th>
                                <th>ROLE</th>
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
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('users.datatables') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'jabatan', name: 'jabatan' },
            { data: 'jawatan', name: 'jawatan' },
            { data: 'role', name: 'role' },
            { data: 'tindakan', name: 'tindakan' }
        ]
    });
});
</script>

@endsection