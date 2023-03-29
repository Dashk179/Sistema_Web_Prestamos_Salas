<!-- modal Update Sala-->
<div class="modal fade" id="modal-update-salas-{{$sala->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Sala</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{route('admin.salas.update',$sala->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{$sala ->nombre}} " >
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" value="{{$sala->descripcion}}" >
                        <label for="imgSala">Imagen Sala </label>
                        <div class="form-group">
                        <img src="{{asset($sala->imgSala)}}" alt="{{$sala->nombre}}" class="img-thumbnail img-fluid" style="height: 150px; width: 150px;">
                            <input type="file" name="imgSala" class="form-control" id="imgSala" value="{{$sala->imgSala}}" >
                        </div>
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
