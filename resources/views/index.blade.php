@extends('layouts.app')
@section('content')

    <nav class="navbar navbar-light bg-main">
        <div class="container p-4">
            <a class="navbar-brand m-auto" href="#">
                REGISTRO DE USO DE SALAS ZAPATA
            </a>
        </div>
    </nav>

    <section class="container-fluid content">
        <!-- Categorías -->
        <div class="row justify-content-center">
            <div class="col-10 col-md-12">
                <nav class="text-center my-5">
                    <a href="#" class="mx-3 pb-3 link-category d-block d-md-inline selected-category">Ver Visitas Registradas</a>
                </nav>
            </div>
        </div>

        <!-- Posts -->
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="row">
                    <!-- Post 1 -->
                    @foreach($salas as $sala)
                    <div class="col-md-6 col-12 justify-content-center mb-5">
                        <div class="card m-auto" style="width: 18rem;">
                            <img class="card-img-top" src="{{asset($sala->imgSala)}}">
                            <div class="card-body">
                                <small class="card-txt-category">Sala</small>
                                <h5 class="card-title my-2">{{$sala->nombre}}</h5>
                                <div class="d-card-text">
                                    {{$sala->descripcion}}
                                </div>
                                <a href="{{route('salas',$sala->id)}}" class="post-link"><b>Ver todas las visitas de la sala</b></a>
                                <hr>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <span class="card-txt-author">Proxima visita</span>
                                    </div>
                                    <div class="col-6 text-right">
                                        @php $encontrado = false; @endphp
                                        @foreach ($sala->eventos()->orderBy('fecha_entrada', 'asc')->get() as $evento)
                                            @if($evento->fecha_entrada >= now())
                                                <span class="card-txt-date">{{ $evento->fecha_entrada }}</span>
                                                @php $encontrado = true; @endphp
                                                @break
                                            @endif
                                        @endforeach
                                        @if(!$encontrado)
                                            <span class="card-txt-date">No hay eventos próximo</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <!-- Post 2 -->
{{--                    <div class="col-md-6 col-12 justify-content-center mb-5">--}}
{{--                        <div class="card m-auto" style="width: 18rem;">--}}
{{--                            <img class="card-img-top" src="{{asset('images/c3.jpg')}}" alt="Post Zapata">--}}
{{--                            <div class="card-body">--}}
{{--                                <small class="card-txt-category">Sala</small>--}}
{{--                                <h5 class="card-title my-2">Zapata</h5>--}}
{{--                                <div class="d-card-text">--}}
{{--                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.--}}
{{--                                    Sed voluptatum ab cumque quisquam quod nesciunt fugiat,--}}
{{--                                    eius corrupti nulla veniam, molestias nemo repudiandae?--}}
{{--                                </div>--}}
{{--                                <a href="#" class="post-link"><b>Registrar visita</b></a>--}}
{{--                                <hr>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-6 text-left">--}}
{{--                                        <span class="card-txt-author">Proxima visita</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 text-right">--}}
{{--                                        <span class="card-txt-date">YYYY-MM-DD hh:mm:ss</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="col-12">
                        <!-- Paginador -->

                    </div>
                </div>
            </div>
        </div>
     </section>


    @vite(['resources/sass/styles.sass','resources/css/styles.css'])

@endsection
