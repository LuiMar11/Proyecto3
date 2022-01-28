@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header text-center">
                <h3>Pagos y Extendido de notas</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action=" " method="GET">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input name="texto" id="texto" type="text" class="form-control"
                                placeholder="Cédula, Nombres o Apellidos">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="search">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
        <div class="row row-cols-2 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Extendido de notas</h5>

                        @foreach ($estudiantes as $estudiante)
                            @foreach ($notas as $enotas)
                                @if ($estudiante->cedula == $enotas->id_estudiante)
                                    <a href="{{ route('notas', $enotas->id) }} "> {{ $estudiante->nombre }}
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

                        @foreach ($estudiantes as $estudiante)
                            @foreach ($pagos as $pago)
                                @if ($estudiante->cedula == $notas->id_estudiante)
                                    <a href=" "> {{ $estudiante->nombre }}
                                        {{ $estudiante->apellido }} Pago</a> <br>

                                @endif

                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
