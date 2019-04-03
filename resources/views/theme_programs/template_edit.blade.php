@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Rekod Program {{ $program->name }}</div>

                <div class="card-body">
                    
                    {!! Form::model($program, ['route' => ['programs.update', $program->id]]) !!}
                    @method('PATCH')

                    @include('theme_programs/template_form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection