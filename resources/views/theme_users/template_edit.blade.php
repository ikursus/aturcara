@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit User: {{ $user->name }}</div>

                <div class="card-body">
                    
                    {!! Form::model($user, ['route' => ['users.update', $user->id] ]) !!}

                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        <label>Email Pengguna</label>
                        {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        {!! Form::text('jabatan', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        <label>Jawatan</label>
                        {!! Form::text('jawatan', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group">
                        <label>Role / Level</label>
                        {!! Form::select('role',['admin' => 'Admin', 'user' => 'User'], null, ['class' => 'form-control', 'required', 'placeholder' => '--Sila Pilih Role--']) !!}
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection