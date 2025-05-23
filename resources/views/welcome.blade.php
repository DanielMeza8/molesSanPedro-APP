@extends('layout/plantilla')

@section('contenido')

    {{-- <div class="hero-header overflow-hidden px-5">
        <div class="rotate-img">
            <img src="{{asset('img/sty-1.png')}}" class="img-fluid w-100" alt="">
            <div class="rotate-sty-2"></div>
        </div>
        <div class="row gy-5 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                <h1 class="display-4 text-dark mb-4 wow fadeInUp" data-wow-delay="0.3s">Misi&oacute;n</h1>
                <p class="fs-4 mb-4 wow fadeInUp" data-wow-delay="0.5s">“Acercar un producto de calidad 
                    de forma práctica y sencilla a través 
                    de los centros comerciales más 
                    demandantes y así llegar hasta
                    los hogares del consumidor final</p>
                <a href="#" class="btn btn-primary border rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Ver productos</a>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                <img src="{{asset('img/sp3.png')}}" class="img-fluid w-100 h-100" alt="">
            </div>
        </div>
    </div> --}}
    <div class="hero-header overflow-hidden px-5">
        <div class="rotate-img">
            <img src="{{asset('img/sty-1.png')}}" class="img-fluid w-100" alt="">
            <div class="rotate-sty-2"></div>
        </div>
        <div class="row gy-5 align-items-center">
            <div id="recetaCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($datos as $index => $item)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }} effectHover">
                            <div class="d-flex flex-column flex-md-row align-items-center justify-content-center p-4" style="background: transparent">
                                
                                <div class="col-md-5 text-center">
                                    <img src="{{ $item['imagen'] }}" class="img-fluid rounded shadow" alt="Imagen receta" style="max-height: 400px;">
                                </div>
                                
                                <div class="col-md-6 ms-md-4 mt-4 mt-md-0 text-start sanPedro" >
                                    {{-- <img src="{{asset('img/sp3.png')}}" class="img-fluid w-100 h-100" alt=""> --}}
                                    @if ($item['titulo'] == "<h3><strong>Lugares donde nos puedes encontrar</strong></h3> <br> <p>Nos encontramos en los mejores supermercados</p>" 
                                    || $item['titulo'] == "Conoce nuestros productos")
                                        <h2 class="fw-bold">{!! $item['titulo'] !!}</h2>
                                        <div class="d-grid gap-2">
                                            <a class="btn btn-light" href="{{route("productos")}}">Ir a productos</a>
                                        </div>
                                    {{-- @elseif(($item['titulo'] == "<h4 class="mb-1 text-primary">El mole</h4><br>
                                    <h1 class="display-5 mb-4">Un platillo mexicano</h1><br>
                                    <p class="mb-4">
                                        El mole es un platillo tradicional mexicano que se originó en la época prehispánica. Su nombre proviene de la palabra náhuatl molli o mulli, que significa salsa. 
                                        Origen prehispánico
                                        Los indígenas mezclaban chiles, semillas de calabaza, hierba santa y jitomate para crear una salsa. 
                                        Se le servía a los grandes señores y se le ofrendaba a los dioses. 
                                        Se acompañaba con carne de guajolote, pato, armadillo, iguana, xoloiscuincles, ranas. 
                                    </p>")) 
                                        <h2 class="fw-bold">{!! $item['titulo'] !!}</h2>
                                        <div class="d-grid gap-2">
                                            <a class="btn btn-light" href="#">Ir a productos</a>
                                        </div> --}}
                                    @else
                                    <h2 class="fw-bold">{!! $item['titulo'] !!}</h2>
                                    <div class="d-grid gap-2">
                                        <a class="btn btn-light" href="{{route("recetas")}}">Ir a recetas</a>
                                    </div>
                                    @endif
                                    
                                    {{-- <div class="mb-3">{!! $item['descripcion'] !!}</div>
                                    <div>{!! $item['procedimiento'] !!}</div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            
                <button class="carousel-control-prev" type="button" data-bs-target="#recetaCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#recetaCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
            
        </div>
    </div>
    
    
@endsection

@section('contenido2')
    <!-- About Start -->
    {{-- <div class="container-fluid overflow-hidden py-5"  style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="RotateMoveLeft">
                        <img src="{{asset('img/platoMole.png')}}" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h4 class="mb-1 text-primary">El mole</h4>
                    <h1 class="display-5 mb-4">Un platillo mexicano</h1>
                    <p class="mb-4">
                        El mole es un platillo tradicional mexicano que se originó en la época prehispánica. Su nombre proviene de la palabra náhuatl molli o mulli, que significa salsa. 
                        Origen prehispánico
                        Los indígenas mezclaban chiles, semillas de calabaza, hierba santa y jitomate para crear una salsa. 
                        Se le servía a los grandes señores y se le ofrendaba a los dioses. 
                        Se acompañaba con carne de guajolote, pato, armadillo, iguana, xoloiscuincles, ranas. 
                    </p>
                    <a href="#" class="btn btn-primary border rounded-pill py-3 px-5">Saber m&aacute;s</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- About End -->


    <!-- Feature Start -->
    
    <!-- Feature End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s" id="contacto">
        <div class="container py-5">
            <div class="row g-5">
                <!-- <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-dark mb-4">Company</h4>
                        <a href=""> Why Mailler?</a>
                        <a href=""> Our Features</a>
                        <a href=""> Our Portfolio</a>
                        <a href=""> About Us</a>
                        <a href=""> Our Blog & News</a>
                        <a href=""> Get In Touch</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-dark">Services</h4>
                        <a href=""> All Services</a>
                        <a href=""> Promotional Emails</a>
                        <a href=""> Product Updates</a>
                        <a href=""> Email Marketing</a>
                        <a href=""> Acquistion Emails</a>
                        <a href=""> Retention Emails</a>
                    </div>
                </div> -->
                <div class="col-md col-lg col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-dark"><Strong>Informaci&oacute;n de contacto</Strong></h4>
                        <a href=""><i class="fa fa-map-marker-alt me-2"></i>Calle Quetzalcoatl</a>
                        <a href=""><i class="fas fa-envelope me-2"></i> moleSanPedro@gmail.com</a>
                        <a href=""><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                        <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-share fa-2x text-secondary me-2"></i>
                            <a class="btn-square btn btn-light rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn-square btn btn-light rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn-square btn btn-light rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn-square btn btn-light rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-dark">Quick Links</h4>
                        <a href=""> About Us</a>
                        <a href=""> Contact Us</a>
                        <a href=""> Privacy Policy</a>
                        <a href=""> Terms & Conditions</a>
                        <a href=""> Our Blog & News</a>
                        <a href=""> Our Team</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-white"><a href="#" class="textoClaro"><i class="fas fa-copyright text-light me-2"></i>Moles San Pedro</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        <!-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> -->
                    </div>
                </div>
            </div>
        </div>
    <!-- Copyright End -->

@endsection