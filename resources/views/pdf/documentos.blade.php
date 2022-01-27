@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header text-center">
                <h3>Pagos y Extendido de notas</h3>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Extendido de notas</h5>

                        @foreach ($estudiantes as $estudiante)
                            @foreach ($notas as $nota)
                                @if ($estudiante->cedula == $nota->id_estudiante)
                                    <a href="{{ route('mostrarNotas', $nota->id) }}"> {{ $estudiante->nombre }}
                                        {{ $estudiante->apellido }} extendido de notas</a> <br>

                                @endif

                            @endforeach
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pagos</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
