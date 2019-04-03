<div class="form-group">
    <label>Nama Program</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>Tarikh Mula</label>
    {!! Form::date('tarikh_mula', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    <label>Tarikh Akhir</label>
    {!! Form::date('tarikh_akhir', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>Lokasi</label>
    {!! Form::text('lokasi', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    <label>Jumlah Peserta</label>
    {!! Form::number('jumlah_peserta', null, ['class' => 'form-control', 'required']) !!}
</div>

<a href="{{ route('programs.index') }}" class="btn btn-secondary">Back</a>
<button type="submit" class="btn btn-primary">Save</button>