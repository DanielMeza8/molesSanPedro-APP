@extends('layout/plantilla')

@section('contenido')

    <div class="hero-header overflow-hidden px-5">
        <div class="rotate-img">
            <img src="img/sty-1.png" class="img-fluid w-100" alt="">
            <div class="rotate-sty-2"></div>
        </div>
        <div class="row gy-5 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="card mb-3" style="max-width: 1040px; background: transparent;">
                    <div class="row g-0">
                    <div class="col-md">
                        <div class="card-body align-items-center">
                        <h5 class="card-title text-center mt-4 fs-3"><strong>Login</strong></h5>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" placeholder="email@example.com">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword">
                                </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-primary mt-4">Iniciar Sesion</button> -->
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-primary border rounded-pill btn-lg">Iniciar Sesion</button>
                                <a href="./registro.html" class="btn btn-light border rounded-pill btn-lg">Registrarse</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- <a href="#" class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Ver productos</a> -->
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                <img src="{{asset('img/sp3.png')}}" class="img-fluid w-100 h-100" alt="">
            </div>
        </div>
    </div> 
        
@endsection