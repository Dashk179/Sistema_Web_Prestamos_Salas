<!-- modal Update Sala-->
<div class="modal fade" id="modal-update-eventos-{{$evento->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Sala</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{route('admin.eventos.update',$evento->id)}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fecha-salida">Fecha Entrada</label>
                        <input type="datetime-local" name="fecha_entrada" class="form-control" id="fecha-entrada" value="{{$evento ->fecha_entrada}}">
                        <label for="descripcion">Fecha Salida</label>
                        <input type="datetime-local" name="fecha_salida" class="form-control" id="fecha-salida" value="{{$evento ->fecha_salida}}">
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
