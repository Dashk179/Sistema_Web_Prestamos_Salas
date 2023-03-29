@extends('adminlte::page')
@csrf
@section('title', 'TecNM |Admin - Materiales')

@section('content')

    @section('content_header')
        <h1>
            Materiales
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-materiales">
                Crear
            </button>
        </h1>
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Listado de Materiales</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="materiales" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($materiales as $material)
                                    <tr>
                                        <td>{{$material ->id}}</td>
                                        <td>{{$material ->nombre}}   </td>
                                        <td>{{$material ->descripcion}}</td>
                                        <td>     {{$material->cantidad}}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#modal-update-materiales-{{$material->id}}">
                                                Editar
                                            </button>
                                            <form action="{{route('admin.materiales.delete',$material->id)}}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('admin.materiales.modal-update-materiales')
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Opciones</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

        <!-- modal -->
        <div class="modal fade" id="modal-create-materiales">
            <div class="modal-dialog">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title">Crear material</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>

                    <form action="{{route('admin.materiales.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Nombre de la material</label>
                                <input type="text" name="nombre" class="form-control" id="nombre">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" name="descripcion" class="form-control" id="descripcion">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="cantidad" class="form-control" id="cantidad">
                            </div>


                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar
                                </button>
                                <button type="submit" class="btn btn-outline-primary">Guardar</button>
                            </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    @stop


    @section('js')
        <script>
            $(document).ready(function () {
                $('#materiales').DataTable({
                    "order": [[3, "desc"]],
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                        "zeroRecords": "No se encontró ninguna coincidencia para tu búsqueda",
                        "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                        'search': 'Buscar',
                        'paginate': {
                            'next': 'Siguiente',
                            'previous': 'Anterior'
                        }
                    }
                });
            });
        </script>
    @stop

@endsection
