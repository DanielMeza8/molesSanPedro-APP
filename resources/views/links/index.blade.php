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
                            <h5 class="card-title text-center mt-4 fs-3"><strong>Administar Links</strong></h5>
                            <br/>
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless mt-4">
                                    <thead>
                                        <tr>
                                            <th>Nombre del link</th>
                                            <th>Link de producto</th>
                                            <th>Producto</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($link as $item)
                                        
                                            <tr>
                                                <td>{{ $item->nombre }}</td>
                                                <td>{{ parse_url($item->url, PHP_URL_HOST) }}</td>
                                                <td>{{$item->producto->nombre}}</td>
                                                <td>
                                                    <div class="">
                                                        <a class="btn btn-warning editar-link" data-bs-toggle="modal" data-bs-target="#modalEditarLink" data-id="{{ $item->id }}" 
                                                                data-nombre="{{ $item->nombre }}" data-url="{{ $item->url }}" data-producto="{{ $item->producto->id }}">Editar</a>
                                                        <div class="modal fade" id="modalEditarLink" tabindex="-1" aria-labelledby="modalEditLinkLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalEditLinkLabel">Editar Link</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form id="formEditarLink" action="{{ route('links.actualizar', ':id') }}" method="POST">
                                                                            <!-- Protección CSRF en Laravel -->
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <input type="hidden" id="link_id" name="id">
                                                                            <div class="mb-3">
                                                                                <label for="producto" class="form-label">Producto</label>
                                                                                <select name="producto" id="producto" class="form-select" required>
                                                                                    <option value="" disabled selected>Selecciona un producto</option>
                                                                                    @foreach ($productos as $producto)
                                                                                        <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="nombreLink" class="form-label">Nombre del link</label>
                                                                                <input type="text" class="form-control" id="nombreLink" name="nombre" required autocomplete="off">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="url" class="form-label">Link de la pagina</label>
                                                                                <input type="url" name="url" id="url" class="form-control" required autocomplete="off">
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
                                                        <form action="{{ route('links.eliminar', $item->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            {{-- <a href="{{ route('links.eliminar', $item->id) }}" class="btn btn-success">Eliminar</a> --}}
                                                            <button type="submit" class="btn btn-success">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-grid gap-2 mx-auto">
                                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLink">Ingresar nuevo link</a>
                                <!-- Modal -->
                                <div class="modal fade" id="modalLink" tabindex="-1" aria-labelledby="modalLinkLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLinkLabel">Nuevo Link</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('links.guardar')}}" method="POST">
                                                    <!-- Protección CSRF en Laravel -->
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="producto" class="form-label">Producto</label>
                                                        <select name="producto" id="producto" class="form-select" required>
                                                            <option value="" disabled selected>Selecciona un producto</option>
                                                            @foreach ($productos as $producto)
                                                                <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nombreLink" class="form-label">Nombre del link</label>
                                                        <input type="text" class="form-control" id="nombreLink" name="nombre" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="url" class="form-label">Link de la pagina</label>
                                                        <input type="url" name="url" id="url" class="form-control" required>
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

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editarButtons = document.querySelectorAll(".editar-link");
    
        editarButtons.forEach(button => {
            button.addEventListener("click", function() {
                const id = this.getAttribute("data-id");
                const nombre = this.getAttribute("data-nombre");
                const url = this.getAttribute("data-url");
                const productoId = this.getAttribute("data-producto");
    
                // Asignar valores a los campos del formulario
                document.getElementById("nombreLink").value = nombre;
                document.getElementById("url").value = url;
                document.getElementById("producto").value = productoId;
    
                // Cambiar la acción del formulario para que haga el update
                document.getElementById("formEditarLink").action = "{{ route('links.actualizar', ':id') }}".replace(':id', id);
                document.getElementById("link_id").value = id;
            });
        });
    });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
        @if(session('alertifySuccess'))
            alertify.success("{{ session('alertifySuccess') }}");
        @endif

        @if(session('alertifyError'))
            alertify.error("{{ session('alertifyError') }}");
        @endif

        @if(session('alertifyConfirm'))
            alertify.confirm("Estas seguro de eliminar el registro.",
            function(){
                alertify.success('Ok');
            },
            function(){
                alertify.error('Cancel');
            });
        @endif
    });
    </script>
    
@endsection