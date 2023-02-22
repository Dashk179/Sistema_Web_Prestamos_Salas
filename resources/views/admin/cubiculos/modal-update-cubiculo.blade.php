<!-- modal Update Cubiculo-->
<div class="modal fade" id="modal-update-cubiculos-{{$cubiculo->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Cubiculo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{route('admin.cubiculos.update',$cubiculo->id)}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Cubiculo</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{$cubiculo ->nombre}} " >
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" value="{{$cubiculo->descripcion}}" >
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
