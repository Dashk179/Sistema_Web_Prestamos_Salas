@extends('layouts.app')

@section('content')
<!-- Contenido -->
<section class="container-fluid content py-5">
    <div class="row justify-content-center">
        <!-- Post -->
        <div class="col-12 col-md-7 text-center">
            <h1>{{$salas->nombre}}</h1>
            <hr>
            <img src="{{asset($salas->imgSala)}}"alt="Post Javascript" class="img-fluid">

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
                </tr>
                </thead>
                <tbody>
                @foreach ($salas->eventos()->orderBy('fecha_entrada', 'asc')->get() as $evento)
                    @if($evento->fecha_entrada >= now())
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($evento->fecha_entrada)->format('Y-m-d') }}</td>
                            <td>{{ substr(\Carbon\Carbon::parse($evento->fecha_entrada)->toTimeString(), 0, 5) }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>




        </div>

    </div>
</section>

<!-- Posts relacionados -->
<section class="container-fluid content py-5">
    <div class="row justify-content-center">
        <!-- Post -->
        <div class="col-12 text-center">
            <h2>Otras Salas</h2>
            <hr class="post-hr">
        </div>
        <!-- Post 3 -->
        <div class="col-md-4 col-12 justify-content-center mb-5">
            <div class="card m-auto" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('images/c3.jpg')}}" alt="Post Python">
                <div class="card-body">
                    <small class="card-txt-category">Sala</small>
                    <h5 class="card-title my-2">Zapata</h5>
                    <div class="d-card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                        eius corrupti nulla veniam, molestias nemo repudiandae?
                    </div>
                    <a href="#" class="post-link"><b>Leer más</b></a>
                    <hr>
                    <div class="row">
                        <div class="col-6 text-left">
                            <span class="card-txt-author">Proxima Visita:</span>
                        </div>
                        <div class="col-6 text-right">
                            <span class="card-txt-date">YYYY-MM-DD hh:mm:ss</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
