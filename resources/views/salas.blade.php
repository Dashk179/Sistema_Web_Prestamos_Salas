@extends('layouts.app')

@section('content')
<!-- Contenido -->
<section class="container-fluid content py-5">
    <div class="row justify-content-center">
        <!-- Post -->
        <div class="col-12 col-md-7 text-center">
            <h1>Morelos</h1>
            <hr>
            <img src="images/cubiculo1.jpg" alt="Post Javascript" class="img-fluid">

            <p class="text-left mt-3 post-txt">
                <span>Descripcion</span>
                <span class="float-right">  </span>
            </p>
            <p class="text-left">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Eaque nemo accusantium libero hic repellat corporis assumenda
                debitis adipisci modi expedita inventore vel excepturi,
                facere animi accusamus? Voluptatem ab ad harum?
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Eaque nemo accusantium libero hic repellat corporis assumenda
                debitis adipisci modi expedita inventore vel excepturi,
                facere animi accusamus? Voluptatem ab ad harum?
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Eaque nemo accusantium libero hic repellat corporis assumenda
                debitis adipisci modi expedita inventore vel excepturi,
                facere animi accusamus? Voluptatem ab ad harum?
            </p>
            <p class="text-left post-txt"><i>Sala</i></p>
        </div>

        <!-- Entradas recientes -->
        <div class="col-md-3 offset-md-1">
            <p>Proximas Visitas</p>
            <div class="row mb-4">
                <div class="col-4 p-0">
                    <a href="#">
                        <img src="images/3.png" class="img-fluid rounded" width="100" alt="">
                    </a>
                </div>
                <div class="col-7 pl-0">
                    <a href="#" class="link-post">YYYY-MM-DD hh:mm:ss</a>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-4 p-0">
                    <a href="#">
                        <img src="images/5.png" class="img-fluid rounded" width="100" alt="">
                    </a>
                </div>
                <div class="col-7 pl-0">
                    <a href="#" class="link-post">YYYY-MM-DD hh:mm:ss</a>
                </div>
            </div>
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
