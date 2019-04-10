
<a href="{{ route('peserta.print', [$item->id, 'cetak' => 'download']) }}" class="btn btn-success btn-sm">
  DOWNLOAD SURAT
</a>
<a href="{{ route('peserta.print', [$item->id, 'cetak' => 'lihat']) }}" class="btn btn-warning btn-sm">
  LIHAT SURAT
</a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update-{{ $item->id }}">
  EDIT
</button>

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $item->id }}">
  DELETE
</button>

<!-- Modal Update-->
{!! Form::model($item->getAttributes(), ['route' => ['peserta.update', $item->id] ] ) !!}
@method('PATCH')

<div class="modal fade" id="update-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT {{ $item->nama }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('theme_peserta/template_form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" class="btn btn-primary">UPDATE</button>
      </div>
    </div>
  </div>
</div>
{!! Form::close()  !!}

<!-- Modal Delete-->
<form method="POST" action="{{ route('programs.destroy', $item->id) }}">
@method('DELETE')
@csrf

<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE CONFIRMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Adakah anda bersetuju untuk hapuskan rekod ini?

        <p>ID : {{ $item->id }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" class="btn btn-danger">CONFIRM</button>
      </div>
    </div>
  </div>
</div>
</form>