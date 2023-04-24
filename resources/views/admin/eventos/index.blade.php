@extends('adminlte::page')
@csrf
@section('title', 'TecNM | Admin - Eventos')

@section('content')

    @section('content_header')
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif

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
                        <div class="card-body table-responsive">
                            <table id="eventos" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Jefe de departamento</th>
                                    <th>Sala</th>
                                    <th>Fecha</th>
                                    <th>Hora entrada</th>
                                    <th>Hora Salida</th>
                                    <th>Docente solicitante</th>
                                    <th>Materiales</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                {{--                                @foreach($user as $users)--}}
                                @foreach($eventos as $evento)
                                    <tr>
                                        <td>{{$evento ->id}}</td>

                                        <td>
                                            @if ($user = App\Models\User::find($evento->user_id))
                                                {{ $user->name }}
                                            @else
                                                Usuario desconocido
                                            @endif
                                        </td>

                                        <td>{{$evento->salas->nombre ?? 'N/A' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($evento->fecha_entrada)->locale('es')->formatLocalized('%A, %d de %B de %Y') }}</td>
                                        <td>{{ substr(\Carbon\Carbon::parse($evento->fecha_entrada)->toTimeString(), 0, 5) }}</td>
                                        <td>{{ substr(\Carbon\Carbon::parse($evento->fecha_salida)->toTimeString(), 0, 5) }}</td>
                                        <td>{{$evento ->email_solicitante}}</td>

                                        <td>

                                            @foreach($evento->materiales as $material)
                                                <li>{{ $material->nombre }}</li>
                                            @endforeach
                                        </td>

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
                                    <th>Fecha</th>
                                    <th>Hora entrada</th>
                                    <th>Hora Salida</th>
                                    <th>Docente solicitante</th>
                                    <th>Materiales</th>
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

                    <form action="{{route('admin.eventos.store')}}" method="POST" onsubmit="changeFechaSalida()">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="user-id">Jefe de departamento</label>
                                <p>{{ Auth::user()->name }} <p>
                                    <input type="hidden" name="user_id" class="form-control" id="user-id"
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
                            </div>
                            <div class="form-group">
                                <label for="fecha-entrada">Fecha entrada</label>
                                <input type="datetime-local" name="fecha_entrada" class="form-control"    id="fecha-entrada">
                                @error('fecha_entrada')
                                <br>
                                <small>*{{$message}}</small>
                                <br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="fecha-salida">Fecha Salida</label>
                                <input type="datetime-local" name="fecha_salida" class="form-control" id="fecha-salida">
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
                                    @foreach ($materiales as $material)
                                        <tr>
                                            <td><input type="checkbox" name="materiales[]" value="{{ $material->id }}">
                                            </td>
                                            <td>{{ $material->nombre }}</td>
                                            <td><input type="number" name="cantidad[]" value="{{ $material->cantidad }}"
                                                       disabled></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
        <script>
            document.querySelectorAll('input[type="checkbox"]').forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    var cantidadInput = this.closest('tr').querySelector('input[name="cantidad[]"]');
                    cantidadInput.disabled = !this.checked;
                    if (!this.checked) {
                        cantidadInput.value = '';
                    }
                });
            });
        </script>
    @stop

@endsection
