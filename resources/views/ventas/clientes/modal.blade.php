<div class="modal fade" id="modal-delete-{{$cli->id_persona}}">
  <div class="modal-dialog" >
    <form action="{{route('clientes.destroy',$cli->id_persona)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-content bg-danger">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Deseas eliminar el cliente {{$cli->nombre}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Eliminar</button>
      </div>
    </div>
    </form>
    
  </div>
</div>