@extends('layout/plantilla')


@section('contenido')
@php
$datos = collect($datos);
@endphp

<div class="container my-5">
    <br><br>
    <h2 class="display-6 text-center mb-4">"Recetas"</h2>

    @foreach($datos->chunk(3) as $grupo)
        <div class="row mb-4">
            @foreach($grupo as $index => $item)
                <div class="col-md-4 d-flex justify-content-center">
                    <div class="card bg-dark text-white" style="width: 100%; cursor: pointer; border:transparent;" data-bs-toggle="modal" data-bs-target="#modal{{ $loop->parent->index * 3 + $loop->index }}">
                        <img src="{{ $item['imagen'] }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-center text-white">{!! $item['titulo'] !!}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@foreach($datos as $index => $item)
    <div class="modal fade" id="modal{{ $index }}" tabindex="-1" aria-labelledby="modalLabel{{ $index }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-conten" style="background-color: hsl(54, 52%, 96%);
		color: hsl(54, 52%, 96%);">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel{{ $index }}">{!! $item['titulo'] !!}</h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="card mb-3" style="max-width: 740px; background:transparent;">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="{{ $item['imagen'] }}" class="img-fluid mb-3" style="max-height: 600px; object-fit: cover;">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="text-dark">{!! $item['descripcion'] !!}</div>
                                    <div class="text-dark">{!! $item['procedimiento'] !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach


@endsection

@section('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://unpkg.com/gridder-js@latest/dist/gridder-js-min.js"></script> --}}
    
@endsection
