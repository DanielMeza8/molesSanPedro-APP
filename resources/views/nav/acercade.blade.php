@extends('layout/plantilla')


@section('contenido')
    <div class="container-fluid feature overflow-hidden py-5 my-4">
        <div class="container py-5">
            
            <div class="row" style="margin-top: 6rem;">
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.1s">
                    <h4 class="text-primary">Historia</h4>
                    <h1 class="display-5 mb-4">Desde 1995 llevando el sabor a tu mesa</h1>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, suscipit itaque quaerat dicta porro illum, autem, molestias ut animi ab aspernatur dolorum officia nam dolore. Voluptatibus aliquam earum labore atque.
                    </p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="d-flex">
                                <i class="fas fa-newspaper fa-4x text-secondary"></i>
                                <div class="d-flex flex-column ms-3">
                                    <h2 class="mb-0 fw-bold">14</h2>
                                    <small class="text-dark">Productos creados</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <i class="fas fa-users fa-4x text-secondary"></i>
                                <div class="d-flex flex-column ms-3">
                                    <h2 class="mb-0 fw-bold">6560</h2>
                                    <small class="text-dark">Clientes felices</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="my-4">
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>
                    </div> -->
                </div>
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="feature-img RotateMoveLeft h-100 text-center" style="object-fit: cover;">
                        <img src="{{asset('img/gourmetMole.png')}}" class="img-fluid w-50 h-80" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://unpkg.com/gridder-js@latest/dist/gridder-js-min.js"></script> --}}
    
@endsection
