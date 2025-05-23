@extends('layout/plantilla3')

@section('contenido')

<div class="hero-header overflow-hidden px-5">
    <div class="rotate-img">
        <img src="img/sty-1.png" class="img-fluid w-100" alt="">
        <div class="rotate-sty-2"></div>
    </div>
    <div class="row gy-5 align-items-center">
        <div class="col-lg wow fadeInLeft" data-wow-delay="0.1s">
            <div class="card mb-3" style="max-width: 1040px; background: transparent;">
                <div class="row g-0">
                <div class="col-md">
                    <div class="card-body align-items-center">
                        <div class="container-fluid blog py-5">
                            <div class="container py-5">
                                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                                    <h4 class="text-primary">Productos</h4>
                                    {{-- <h1 class="display-5 mb-4">Join Us For New Blog</h1>
                                    <p class="mb-0">Dolor sit amet consectetur, adipisicing elit. Ipsam, beatae maxime. Vel animi eveniet doloremque reiciendis soluta iste provident non rerum illum perferendis earum est architecto dolores vitae quia vero quod incidunt culpa corporis, porro doloribus. Voluptates nemo doloremque cum.
                                    </p> --}}
                                </div>
                                <div class="row g-4 justify-content-center">
                                    @foreach ($products as $item)    
                                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="blog-item">
                                                <div class="blog-img">
                                                    <img src="{{asset('storage/' . $item->imagen)}}" class="img-fluid w-100" alt="">
                                                    <div class="blog-info">
                                                        <span><i class="fa fa-clock"></i> {{$item->created_at->format('M d, Y')}}</span>
                                                        {{-- <div class="d-flex">
                                                            <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                                            <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="blog-content text-dark border p-4 ">
                                                    <h5 class="mb-4">{{$item->nombre}}</h5>
                                                    <p class="mb-4">{{Str::limit($item->descripcion, 100)}}</p>
                                                    <p><strong>Precio:</strong> ${{number_format($item->precio)}}</p>
                                                    <p><strong>Categor&iacute;a:</strong> {{$item->categoria_id}} </p>
                                                    <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mx-auto">
                            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCategoria">Ingresar nuevo producto</a>
                            <!-- Modal -->
                            <div class="modal fade" id="modalCategoria" tabindex="-1" aria-labelledby="modalCategoriaLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCategoriaLabel">Nuevo Producto</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('productos.guardar')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                {{-- <div class="mb-3">
                                                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                                </div> --}}
                                                <div class="mb-3">
                                                    <label for="nombreProducto" class="form-label">Nombre del producto</label>
                                                    <input type="text" class="form-control" id="nombreProducto" name="nombre" required>
                                                </div>
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a comment here" name="descripcion" id="floatingTextarea2" style="height: 100px" required></textarea>
                                                    <label for="floatingTextarea2">Descripci&oacute;n</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cantidad" class="form-label">Cantidad</label>
                                                    <input type="number" class="form-control" id="cantidad" name="cantidad" value="0" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="precio" class="form-label">Precio</label>
                                                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="categoria" class="form-label">Categoria</label>
                                                    <select class="form-select" name="categoria" id="categoria" required >
                                                        <option value="" disabled selected>Selecciona una categoria</option>
                                                        @foreach ($categorias as $categoria)
                                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="imagen" class="form-label">Imagen</label>
                                                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
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

                            <a href="{{route('links.index')}}" class="btn btn-primary">Administrar links</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <a href="#" class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Ver productos</a> -->
    </div>
        {{-- <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
            <img src="{{asset('img/sp3.png')}}" class="img-fluid w-100 h-100" alt="">
        </div> --}}
    </div>
</div> 
    
        
@endsection