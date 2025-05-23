@extends('layout/plantilla3')

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
                            <h5 class="card-title text-center mt-4 fs-3"><strong>Administar Categorias</strong></h5>
                            <br/>
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless mt-4">
                                    <thead>
                                        <tr>
                                            <th>Nombre de la categoria</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                        
                                        <tr>
                                            <td>{{ $item->nombre }}</td>
                                                <td>
                                                    <div class="">
                                                        <a href="" class="btn btn-warning">Editar</a>
                                                        <a href="" class="btn btn-success">Eliminar</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-grid gap-2 mx-auto">
                                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCategoria">Ingresar nueva categoria</a>
                                <!-- Modal -->
                                <div class="modal fade" id="modalCategoria" tabindex="-1" aria-labelledby="modalCategoriaLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCategoriaLabel">Nueva Categoría</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('categorias.guardar')}}" method="POST">
                                                    <!-- Protección CSRF en Laravel -->
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="nombreCategoria" class="form-label">Nombre de la categoría</label>
                                                        <input type="text" class="form-control" id="nombreCategoria" name="nombre" required>
                                                    </div>
                                                    <div class="d-grid gap-2">
                                                        
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <p>moles San Pedro</p>        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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