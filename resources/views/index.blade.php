@extends('layouts.app')
@section('content')

<nav class="navbar navbar-light bg-main">
    <div class="container p-4">
        <a class="navbar-brand m-auto" href="#">
            <h1>REGISTRO DE USO DE SALAS
                ZAPATA</h1>
        </a>
    </div>
</nav>

<section class="container-fluid content">
    <!-- Categorías -->
    <div class="row justify-content-center">
        <div class="col-10 col-md-12">
            <nav class="text-center my-5">
                <a href="#" class="mx-3 pb-3 link-category d-block d-md-inline selected-category">Ver Visitas Registradss</a>
            </nav>
        </div>
    </div>

    <!-- Posts -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="row">
                <!-- Post 1 -->
                <div class="col-md-4 col-12 justify-content-center mb-5">
                    <div class="card m-auto" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('images/cubiculo1.jpg')}}" alt="Post Python">
                        <div class="card-body">
                            <small class="card-txt-category">Cubiculo: 1</small>
                            <h5 class="card-title my-2">Miguel Hidalgo y Costilla</h5>
                            <div class="d-card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                                eius corrupti nulla veniam, molestias nemo repudiandae?
                            </div>
                            <a href="#" class="post-link"><b>Registrar visita</b></a>
                            <hr>
                            <div class="row">
                                <div class="col-6 text-left">
                                    <span class="card-txt-author">Proxima visita</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="card-txt-date">YYYY-MM-DD hh:mm:ss</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post 2 -->
                <div class="col-md-4 col-12 justify-content-center mb-5">
                    <div class="card m-auto" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('images/c2.jpg')}}" alt="Post Python">
                        <div class="card-body">
                            <small class="card-txt-category">Cubiculo: 2</small>
                            <h5 class="card-title my-2">Josefa Ortíz de Domínguezs</h5>
                            <div class="d-card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                                eius corrupti nulla veniam, molestias nemo repudiandae?
                            </div>
                            <a href="#" class="post-link"><b>Registrar visita</b></a>
                            <hr>
                            <div class="row">
                                <div class="col-6 text-left">
                                    <span class="card-txt-author">Proxima visita</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="card-txt-date">YYYY-MM-DD hh:mm:ss</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post 3 -->
                <div class="col-md-4 col-12 justify-content-center mb-5">
                    <div class="card m-auto" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('images/c3.jpg')}}" alt="Post Python">
                        <div class="card-body">
                            <small class="card-txt-category">Cubiculo: 3</small>
                            <h5 class="card-title my-2">Emiliano Zapata</h5>
                            <div class="d-card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                                eius corrupti nulla veniam, molestias nemo repudiandae?
                            </div>
                            <a href="#" class="post-link"><b>Registrar visita</b></a>
                            <hr>
                            <div class="row">
                                <div class="col-6 text-left">
                                    <span class="card-txt-author">Proxima visita</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="card-txt-date">YYYY-MM-DD hh:mm:ss</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <!-- Paginador -->

        </div>
    </div>
</section>


@vite(['resources/sass/styles.sass','resources/css/styles.css'])

@endsection
