@extends('layout.plantilla3')

@section('contenido')

<div class="hero-header overflow-hidden px-5">
    <div class="rotate-img">
        <img src="{{asset('img/sty-1.png')}}" class="img-fluid w-100" alt="">
        <div class="rotate-sty-2"></div>
    </div>
    <div class="row gy-5 align-items-center">
        <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
            {{-- <h1 class="display-4 text-dark mb-4 wow fadeInUp" data-wow-delay="0.3s">Sesion de administrador</h1>
            <p class="fs-4 mb-4 wow fadeInUp" data-wow-delay="0.5s">
            <a href="#" class="btn btn-primary border rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Hola admin</a>
            <!-- Pricing Start Productos aqui van--> --}}
        <div class="container-fluid price py-5">
            
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                    <h4 class="text-primary">Session de administrador</h4>
                    <h1 class="display-5 mb-4">Hola admin</h1>
                    <p class="mb-0">Bienvenido</p>
                </div>
                <div class="row g-5 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s" onclick="location.href='{{ route('productos.index') }}';" style="cursor: pointer;">
                        <div class="price-item bg-light rounded text-center">
                            <div class="text-center text-dark border-bottom d-flex flex-column justify-content-center p-4" style="width: 100%; height: 160px;">
                                <p class="fs-5 fw-bold text-uppercase mb-0">Productos</p>
                                <div class="d-flex justify-content-center">
                                    {{-- <a class="mb-0 btn btn-light"><span class="">administrar</span></a> --}}
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s" onclick="location.href='{{ route('categorias') }}';" style="cursor: pointer;">
                        <div class="price-item bg-light rounded text-center">
                            {{-- <div class="pice-item-offer">Popular</div> --}}
                            <div class="text-center text-primary border-bottom d-flex flex-column justify-content-center p-4" style="width: 100%; height: 160px;">
                                <p class="fs-5 fw-bold text-uppercase mb-0">Categorias</p>
                                <div class="d-flex justify-content-center">
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="price-item bg-light rounded text-center">
                            <div class="text-center text-secondary border-bottom d-flex flex-column justify-content-center p-4" style="width: 100%; height: 160px;">
                                <p class="fs-5 fw-bold text-uppercase mb-0">Código de barras</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                        data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Subir archivo Excel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Adjunta el archivo a transformar en códigos de barras</p>
                                    <form action="{{ route('importar.excel') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="archivo" id="archivo" accept=".xls,.xlsx">
                                        <br />
                                        <button class="btn btn-success mt-2 text-white" type="submit">Importar</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            
        </div>
        <!-- Pricing End -->
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
            <img src="{{asset('img/sp3.png')}}" class="img-fluid w-100 h-100" alt="">
        </div>
    </div>
</div>
    
@endsection