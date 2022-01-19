@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-border-success">
                    <div class="card-header text-center">
                        <h4> Estudiante : {{ $estudiante->nombre }} {{ $estudiante->apellido }}</h4>

                        <h5>Pago</h5>
                        <a href="" class="btn btn-primary"><i class="fas fa-file-upload"></i></a>
                        <a href="" class="btn btn-success"><i class="fas fa-eye"></i></a>

                    </div>
                    <div class="card-body justify-content-center">

                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="table-ligth" style="background-color: #53cf48;">
                                    <th>Código proyecto</th>
                                    <th>Titulo proyecto</th>
                                    <th>Modalidad</th>
                                    <th>Fecha Inicio</th>
                                    <th>Estado</th>
                                    <th>Director</th>
                                    <th>Evaluador</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($proyectos as $proyecto)
                                            @if (($proyecto->id_estudiante1 == $estudiante->id) | ($proyecto->id_estudiante2 == $estudiante->id) | ($proyecto->id_estudiante3 == $estudiante->id))
                                                <td>{{ $proyecto->codigo }}</td>
                                                <td>{{ $proyecto->titulo }}</td>
                                                <td> {{ $proyecto->modalidad }} </td>
                                                <td>{{ $proyecto->inicio }}</td>
                                                <td>{{ $proyecto->estado }}</td>
                                            @endif

                                            @foreach ($docentes as $docente)
                                                @if ($proyecto->id_director == $docente->id)
                                                    <td>{{ $docente->nombre }} {{ $docente->apellido }}</td>
                                                @endif

                                                @if ($proyecto->id_evaluador == $docente->id)
                                                    <td>{{ $docente->nombre }} {{ $docente->apellido }}</td>
                                                @endif

                                            @endforeach

                                        @endforeach

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
