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
    @if (Request::is(['peserta/create']))
    {!! Form::radio('is_vegetarian', 1) !!} YES
    {!! Form::radio('is_vegetarian', 0) !!} NO
    @else
    {!! Form::radio('is_vegetarian', 1, $item->is_vegetarian == 1 ? true : false) !!} YES
    {!! Form::radio('is_vegetarian', 0, $item->is_vegetarian == 0 ? true : false) !!} NO
    @endif
    
</div>