<!-- modal Update Sala-->
<div class="modal fade" id="modal-update-correoContenido-{{$sala->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Contenido Correo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{route('admin.correoContenido.update',$sala->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="encabezado">Imagen Encabezado </label>
                        <div class="form-group">
                        <img src="{{asset($sala->encabezado)}}" alt="{{$sala->encabezado}}" class="img-thumbnail img-fluid" style="height: 150px; width: 150px;">
                            <input type="file" name="encabezado" class="form-control" id="encabezado" value="{{$sala->encabezado}}" >
                        </div>
                        <label for="piedepagina">Imagen Pie de Pagina</label>
                        <div class="form-group">
                            <img src="{{asset($sala->piedepagina)}}" alt="{{$sala->piedepagina}}" class="img-thumbnail img-fluid" style="height: 150px; width: 150px;">
                            <input type="file" name="piedepagina" class="form-control" id="piedepagina" value="{{$sala->piedepagina}}" >
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
