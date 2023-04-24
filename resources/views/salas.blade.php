@extends('layouts.app')

@section('content')
    <!-- Contenido -->
    <section class="container-fluid content py-5">
        <div class="row justify-content-center">
            <!-- Post -->
            <div class="col-12 col-md-7 text-center">
                <h1>{{$salas->nombre}}</h1>
                <hr>
                <img src="{{asset($salas->imgSala)}}" alt="Post Javascript" class="img-fluid col-md-6">


                <p class="text-left mt-3 post-txt">
                    <span>Descripcion</span>
                    <span class="float-right">  </span>
                </p>
                <p class="text-left">
                    {{$salas->descripcion}}
                </p>
                <p class="text-left post-txt"><i>Edificio F</i></p>
            </div>

            <!-- Entradas recientes -->
            <div class="col-md-3 offset-md-1">
                <p>Proximas Visitas</p>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora de entrada</th>
                        <th>Hora de salida</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($salas->eventos()->orderBy('fecha_entrada', 'asc')->get() as $evento)
                        @if($evento->fecha_entrada >= now())
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($evento->fecha_entrada)->format('Y-m-d') }}</td>
                                <td>{{ substr(\Carbon\Carbon::parse($evento->fecha_entrada)->toTimeString(), 0, 5) }}</td>
                                <td>{{ substr(\Carbon\Carbon::parse($evento->fecha_salida)->toTimeString(), 0, 5) }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>


            </div>

        </div>
    </section>



@endsection
