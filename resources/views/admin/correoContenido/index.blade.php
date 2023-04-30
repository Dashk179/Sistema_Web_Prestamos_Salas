@extends('adminlte::page')
@csrf
@section('title', 'TecNM | Admin - salas')

@section('content')

    @section('content_header')
        <h1>
            Sala
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-salas">
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
                            <h3 class="card-title">Listado de Salas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="categories" class="table table-bordered table-striped" >
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Encabezado</th>
                                    <th>Pie de pagina</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contenido as $sala)
                                    <tr>
                                        <td>{{$sala ->id}}</td>
                                        <td>
                                            <img src="{{asset($sala->encabezado)}}" alt="{{$sala->encabezado}}"  class="img-thumbnail img-fluid" style="height: 150px; width: 350px;">
                                        </td>
                                        <td>
                                            <img src="{{asset($sala->piedepagina)}}" alt="{{$sala->piedepagina}}"  class="img-thumbnail img-fluid" style="height: 150px; width: 350px;">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#modal-update-correoContenido-{{$sala->id}}">
                                                Editar
                                            </button>
                                        </td>
                                    </tr>
                                    @include('admin.correoContenido.modal-update-correoContenido')
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Encabezado</th>
                                    <th>Pie de pagina</th>
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
        <div class="modal fade" id="modal-create-salas">
            <div class="modal-dialog">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Sala</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>

                    <form action="{{route('admin.correoContenido.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="encabezado">Encabezado</label>
                                <input type="file" name="encabezado" class="form-control " id="encabezado">
                            </div>
                            <div class="form-group">
                                <label for="piedepagina">Imagen Sala</label>
                                <input type="file" name="piedepagina" class="form-control " id="piedepagina">
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

    @stop


    @section('js')
        <script>
            $(document).ready(function () {
                $('#categories').DataTable({
                    "order": [[3, "desc"]],
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                        "zeroRecords": "No se encontró ninguna coincidencia para tu búsqueda",
                        "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                        'search': 'Buscar',
                        'paginate':{
                            'next': 'Siguiente',
                            'previous':'Anterior'
                        }
                    }
                });
            });
        </script>
    @stop

@endsection
