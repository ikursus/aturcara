@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Rekod Program Baru</div>

                <div class="card-body">
                    
                    {!! Form::open(['route' => 'programs.store']) !!}

                    @include('theme_programs/template_form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection