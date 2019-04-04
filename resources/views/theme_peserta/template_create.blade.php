@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Rekod Peserta Baru</div>

                <div class="card-body">
                    
                    {!! Form::open(['route' => 'peserta.store']) !!}

                    @include('theme_peserta/template_form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection