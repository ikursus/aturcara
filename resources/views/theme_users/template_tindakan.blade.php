<a href="{{ route('users.edit', $item->id) }}" class="btn btn-info">EDIT</a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $item->id }}">
  DELETE
</button>

<!-- Modal -->
<form method="POST" action="{{ route('users.destroy', $item->id) }}">
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