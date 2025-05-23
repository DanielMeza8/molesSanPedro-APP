@extends('layout/plantilla')


@section('contenido')
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
            {{-- <h4 class="text-primary">Productos</h4> --}}
            <h3 class="mb-4"><strong>Siempre trabajando con los m&aacute;s altos estandares de calidad para llevarte los mejores productos</strong></h3>
            {{-- <p class="mb-0">Siempre trabajando con los mas altos estandares de calidad para llevarte los mejores productos</p> --}}
        </div>
        <div class="row g-4 justify-content-center">
    @foreach ($products as $productoNombre => $items)    
        @php
            $info = $items->first(); // Tomamos los datos del primer elemento del grupo
        @endphp

        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
            <div class="blog-item">
                <div class="blog-img">
                    <img src="{{ asset('storage/' . $info->imegen) }}" class="img-fluid w-100" alt="{{ $info->producto }}">
                </div>
                <div class="blog-content text-white border p-4" style="background: #4e3629">
                    <h5 class="mb-4 text-white">{{ $info->producto }}</h5>
                    <p class="mb-4">{{ Str::limit($info->descripcion, 100) }}</p>
                    
                    <!-- Botón para mostrar modal único por producto -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-{{ Str::slug($info->producto) }}">
                        Comprar
                    </button>

                    <!-- Modal único para cada producto -->
                    <div class="modal fade" id="modal-{{ Str::slug($info->producto) }}" tabindex="-1" aria-labelledby="modalLabel-{{ Str::slug($info->producto) }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel-{{ Str::slug($info->producto) }}">Selecciona donde comprar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($items as $url)
                                        <a class="btn btn-light mt-3 rounded-pill py-2 px-4 d-block" href="{{ $url->link }}" target="_blank">
                                            {{ $url->empresa }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin del Modal -->
                </div>
            </div>
        </div>
    @endforeach
</div>

    </div>
</div>
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

@section('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
{{-- <script src="https://unpkg.com/gridder-js@latest/dist/gridder-js-min.js"></script> --}}

@endsection
{{-- @extends('layout/footer') --}}
