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
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{$sala ->nombre}} ">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion"
                               value="{{$sala->descripcion}}">
                        <label for="imgSala">Imagen Sala </label>
                        <div class="form-group">
                            <img src="{{asset($sala->imgSala)}}" alt="{{$sala->nombre}}" class="img-thumbnail img-fluid"
                                 style="height: 150px; width: 150px;">
                            <input type="file" name="imgSala" class="form-control" id="imgSala"
                                   value="{{$sala->imgSala}}">
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Eliminar Materiales</h3>
                                <div class="card-tools">
                                    <!-- Collapse Button -->
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table>
                                    <p>Solo los materiales selecionados se conservaran en la sala</p>
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Material</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sala->materialesSalas as $material)
                                        <tr>
                                            <td><input type="checkbox" name="materiales[]" value="{{ $material->id }}"
                                                       checked></td>
                                            <td>{{ $material->nombre }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Actualizar Materiales</h3>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table>
                                <p>Selecione el material y la cantidad que sea actualizar</p>
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Material</th>
                                    <th>Cantidad</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($materiales as $material)
                                    <tr>
                                        <td><input type="checkbox" name="materiales[]" value="{{ $material->id }}"></td>
                                        <td>{{ $material->nombre }}</td>
                                        <td>
                                            <input type="number" name="cantidad[{{ $material->id }}]"
                                                   value="{{ old('cantidad.' . $material->id, $material->cantidad) }}"
                                                   min="0" max="{{ $material->cantidad }}">
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <!-- /.card -->

        </div>


        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-outline-primary">Guardar</button>
        </div>
        </form>
    </div>
</div>
</div>
</div>
