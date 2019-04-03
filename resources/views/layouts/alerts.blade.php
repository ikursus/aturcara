<div class="container">

@if (session('alert-success'))
<div class="alert alert-success">
{{ session('alert-success')}}
</div>
@endif

@if (session('alert-error'))
<div class="alert alert-danger">
{{ session('alert-error') }}
</div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>

