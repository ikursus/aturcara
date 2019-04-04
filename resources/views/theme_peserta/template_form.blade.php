<div class="form-group">
    <label>Program</label>
    {!! Form::select('program_id', $programs, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>Nama</label>
    {!! Form::text('nama', null, ['class' => 'form-control', 'required']) !!}
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
    <label>Email</label>
    {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    <label>Status</label>
    {!! Form::select('status', ['Hadir' => 'Hadir', 'Tidak Hadir' => 'Tidak Hadir'], null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    <label>Vegeterian?</label>
    {!! Form::radio('is_vegeterian', 1) !!} YES
    {!! Form::radio('is_vegeterian', 0) !!} NO
</div>

<a href="{{ route('programs.index') }}" class="btn btn-secondary">Back</a>
<button type="submit" class="btn btn-primary">Save</button>