@extends('adminlte::page')
@csrf
@section('title', 'Admin - Eventos')

@section('content')

    @section('content_header')
        <h1>
            Eventos
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-eventos">
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
                            <h3 class="card-title">Listado de Eventos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="eventos" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Jefe de departamento</th>
                                    <th>Sala</th>
                                    <th>Fecha Entrada</th>
                                    <th>Fecha Salida</th>
                                    <th>Docente solicitante</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--                                @foreach($user as $users)--}}
                                @foreach($eventos as $evento)
                                    <tr>
                                        <td>{{$evento ->id}}</td>

                                        <td>{{ $evento->user_id}}  </td>

                                        <td>{{$evento->salas->nombre}}</td>
                                        <td>{{$evento ->fecha_entrada}}</td>
                                        <td>{{$evento ->fecha_salida}}</td>
                                        <td>{{$evento ->email_solicitante}}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#modal-update-eventos-{{$evento->id}}">
                                                Editar
                                            </button>
                                            <form action="{{route('admin.eventos.delete',$evento->id)}}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('admin.eventos.modal-update-eventos')

                                @endforeach

                                {{--                                @endforeach--}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Jefe de departamento</th>
                                    <th>Sala</th>
                                    <th>Fecha Entrada</th>
                                    <th>Fecha Salida</th>
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
        <div class="modal fade" id="modal-create-eventos">
            <div class="modal-dialog">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Evento</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>

                    <form action="{{route('admin.eventos.store')}}" method="POST" >
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="user-id">Jefe de departamento</label>
                                <p>{{ Auth::user()->name }} <p>
                                    <input type="text" name="user_id" class="form-control" id="user-id"
                                           value="{{Auth::user()->id}}">
                            </div>
                            <div class="form-group">
                                <label for="salas-id">Sala</label>
                                <select name="salas_id" id="salas-id" class="form-control">
                                    <option value=""> -- Elegir Sala --</option>
                                    @foreach($salas as $salas)
                                        <option value="{{$salas->id}}">{{$salas->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('salas_id')
                                <br>
                                <small>*{{$message}}</small>
                                <br>
                                @enderror
                                </d iv>
                                <div class="form-group">
                                    <label for="fecha-entrada">Fecha entrada</label>
                                    <input type="datetime-local" name="fecha_entrada" class="form-control"
                                           id="fecha-entrada">
                                </div>
                                <div class="form-group">
                                    <label for="fecha-salida">Fecha Salida</label>
                                    <input type="datetime-local" name="fecha_salida" class="form-control"
                                           id="fecha-salida">
                                    @error('fecha_salida')
                                    <br>
                                    <small>*{{$message}}</small>
                                    <br>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Correo Docente</label>
                                    <input type="text" name="email_solicitante" class="form-control"
                                           id="email-solicitante">
                                    @error('email_solicitante')
                                    <br>
                                    <small>*{{$message}}</small>
                                    <br>
                                    @enderror
                                </div>
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
                $('#eventos').DataTable({
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
