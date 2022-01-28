@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-auto">
                <div class="card card-lg border-success">
                    <div class="card-header text-center">
                        <h3>Lista Proyectos</h3>
                        @can('proyectos.create')
                            <a class="btn btn-success float-right" href="{{ route('proyectos.create') }}"><i
                                    class="fas fa-plus"></i></a>
                        @endcan
                        <br><br>

                        @can('proyectos.edit')
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <form action="{{ route('imprimir') }}" method="GET">
                                        <div class="input-group">
                                            <input name="fecha" id="fecha" type="date" class="form-control"
                                                placeholder="Fecha acta a generar" required>

                                            <div class="input-group-append">
                                                <button class="btn btn-success" style="background-color: #53cf48;" type="submit"
                                                    id="search">Generear acta</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endcan

                        <br><br>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="{{ route('proyectos.index') }}" method="GET">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input name="texto" id="texto" type="text" class="form-control"
                                            placeholder="Buscar por Codigo, Titulo,  Modalidad, Fecha inicio, Acta o Estado">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-success" type="submit"
                                                id="search">Buscar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body justify-content-center">
                            <div class="table-responsive">
                                <table class="table table-md  text-center">
                                    <thead class="table-ligth" style="background-color: #53cf48;">
                                        <th>Codigo</th>
                                        <th>Titulo</th>
                                        <th>Modalidad</th>
                                        <th>Estudiantes</th>
                                        <th>Director</th>
                                        <th>Evaluador</th>
                                        <th>Fecha Acta Aceptación</th>
                                        <th>Estado Proyecto</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Finalización</th>
                                        <th>Observaciones</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody class="text-center">

                                        @if (count($proyectos) <= 0)
                                            <tr>
                                                <td colspan="13">
                                                    No se encontraron resultados
                                                </td>
                                            </tr>

                                        @else
                                            @foreach ($proyectos as $proyecto)
                                                <tr>
                                                    <td>
                                                        {{ $proyecto->codigo }}
                                                    </td>
                                                    <td>
                                                        {{ $proyecto->titulo }}
                                                    </td>
                                                    <td>
                                                        {{ $proyecto->modalidad }}
                                                    </td>
                                                    <td>

                                                        @if (($proyecto->id_estudiante1 != null) | ($proyecto->id_estudiante2 != null) | $proyecto->id_estudiante3)

                                                            @foreach ($estudiantes as $estudiante)

                                                                @if (($proyecto->id_estudiante1 == $estudiante->id) | ($proyecto->id_estudiante2 == $estudiante->id) | ($proyecto->id_estudiante3 == $estudiante->id))
                                                                    - {{ $estudiante->nombre }}
                                                                    {{ $estudiante->apellido }}
                                                                    <br>
                                                                @endif

                                                            @endforeach

                                                        @endif

                                                    </td>
                                                    <td>
                                                        @foreach ($docentes as $docente)
                                                            @if ($proyecto->id_director == $docente->id)
                                                                {{ $docente->nombre }} {{ $docente->apellido }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($docentes as $docente)
                                                            @if ($proyecto->id_evaluador == $docente->id)
                                                                {{ $docente->nombre }} {{ $docente->apellido }}
                                                            @endif
                                                        @endforeach

                                                    </td>
                                                    <td>
                                                        {{ $proyecto->acta }}
                                                    </td>
                                                    <td>{{ $proyecto->estado }}</td>
                                                    <td>
                                                        {{ $proyecto->inicio }}
                                                    </td>
                                                    <td>
                                                        {{ $proyecto->fin }}
                                                    </td>
                                                    <td>{{ $proyecto->observaciones }}</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="{{ url('/proyectos/' . $proyecto->id) }}"><i
                                                                class="fas fa-info-circle"></i></a>
                                                    </td>
                                                    <td>
                                                        @can('proyectos.edit')
                                                            <a href="{{ url('/proyectos/' . $proyecto->id . '/edit') }}"
                                                                class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                        @endcan

                                                    </td>
                                                    <td>
                                                        @can('proyectos.delete')
                                                            <form action="{{ url('/proyectos/' . $proyecto->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button class="btn btn-danger" type="submit"
                                                                    onclick="return confirm('¿Desea eliminar el proyecto?')"><i
                                                                        class="fas fa-trash"></i></button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $proyectos->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
