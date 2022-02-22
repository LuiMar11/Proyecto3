@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-success">
                    <div class="card-header text-center">
                        <h4> Estudiante : {{ $estudiante->nombre }} {{ $estudiante->apellido }}</h4>

                        {{-- Subir archivo --}}
                        @can('estudiantes.create')
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fas fa-file-upload"></i>
                                </button>
                            </td>

                            <form method="POST" enctype="multipart/form-data" action=" {{ url('/uploadPago') }} " id="form">
                                @csrf
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header-center">
                                                <h4 class="modal-title">Upload pago</h4>

                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <input type="file" name="file" id="file" class="form-control">
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="">Nombres y Apellidos del estudiante</label>
                                                        <select name="id_estudiante" id="id_estudiante" class="form-control">
                                                            <option value="{{ $estudiante->cedula }}">
                                                                {{ $estudiante->nombre }}
                                                                {{ $estudiante->apellido }}</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="submit" class="btn btn-success"
                                                    style="background-color: #0dac54;">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endcan

                        <div class="card-body justify-content-center">

                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="table-ligth" style="background-color: #53cf48;">
                                        <th>Código proyecto</th>
                                        <th>Titulo proyecto</th>
                                        <th>Modalidad</th>
                                        <th>Fecha aprobación</th>
                                        <th>Estado</th>
                                        <th>Fecha inicio</th>
                                        <th>Director</th>
                                        <th>Evaluador</th>

                                    </thead>
                                    <tbody>
                                        @foreach ($proyectos as $proyecto)
                                            <tr>
                                                @if (($estudiante->id == $proyecto->id_estudiante1)|($estudiante->id == $proyecto->id_estudiante2)|($estudiante->id == $proyecto->id_estudiante3))
                                                    <td>{{ $proyecto->codigo }}</td>
                                                    <td>{{ $proyecto->titulo }}</td>
                                                    <td> {{ $proyecto->modalidad }} </td>
                                                    <td>{{ $proyecto->acta }}</td>
                                                    <td>{{ $proyecto->estado }}</td>
                                                    <td>{{ $proyecto->inicio }}</td>
                                                @endif

                                                @foreach ($docentes as $docente)
                                                    @if ($docente->id == $proyecto->id_director)
                                                        <td>{{ $docente->nombre }} {{ $docente->apellido }}</td>
                                                    @endif
                                                    @if ($docente->id == $proyecto->id_evaluador)
                                                        <td>{{ $docente->nombre }} {{ $docente->apellido }}</td>
                                                    @endif
                                                @endforeach

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
    </div>
@endsection
