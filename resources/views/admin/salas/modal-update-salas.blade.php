<!-- modal Update Sala-->
<div class="modal fade" id="modal-update-salas-{{$sala->id}}">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTablaLabel">Editar sala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

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
                                <div class="form-group">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Material</th>
                                            <th>Cantidad</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sala->materialesSalas as $material)
                                            <tr>
                                            <td><input type="checkbox" name="materiales[]" value="{{ $material->id }}"></td>
                                                <td>{{ $material->nombre }}</td>
                                                <td>
                                                    <input type="number" name="cantidad[{{ $material->id }}]"
                                                           value="{{ old('cantidad.' . $material->id, $material->pivot->cantidad) }}"
                                                           min="0" max="{{ $material->cantidad }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-primary">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
