@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-border-success">
                    <div class="card-header text-center">
                        <h4> Docente {{ $docente->nombre }} {{ $docente->apellido }}</h4>
                    </div>
                    <div class="card-body justify-content-center">
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="table-ligth" style="background-color: #53cf48;">
                                    <th>Código proyecto</th>
                                    <th>Titulo proyecto</th>
                                    <th>Modaliad</th>
                                    <th>Fecha inicio</th>
                                    <th>Estado</th>
                                    <th>Rol en el proyecto</th>
                                    <th>Estudiantes</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($proyectos as $proyecto)
                                        <tr>
                                            @if (($proyecto->id_director == $docente->id) | ($proyecto->id_evaluador == $docente->id))
                                                <td>{{ $proyecto->codigo }}</td>
                                                <td>{{ $proyecto->titulo }}</td>
                                                <td> {{$proyecto->modalidad}} </td>
                                                <td>{{ $proyecto->inicio }}</td>
                                                <td>{{ $proyecto->estado }}</td>
                                            @endif

                                            @if ($proyecto->id_director == $docente->id)
                                                <td>Director</td>
                                            @else
                                                <td>Evaluador</td>
                                            @endif

                                            @if (($proyecto->id_estudiante1 != null) | ($proyecto->id_estudiante2 != null) | $proyecto->id_estudiante3)

                                                @foreach ($estudiantes as $estudiante)

                                                    @if (($proyecto->id_estudiante1 == $estudiante->id) | ($proyecto->id_estudiante2 == $estudiante->id) | ($proyecto->id_estudiante3 == $estudiante->id))
                                                        <td> - {{ $estudiante->nombre }}
                                                            {{ $estudiante->apellido }}</td>
                                                        <br>
                                                    @endif

                                                @endforeach

                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
