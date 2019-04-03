
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
