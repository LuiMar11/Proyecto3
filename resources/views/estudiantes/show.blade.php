@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-success">
                    <div class="card-header text-center">
                        <h4> Estudiante : {{ $estudiante->nombre }} {{ $estudiante->apellido }}</h4>

                        @can('estudiantes.create')
                            <br>
                            <h5>Pago</h5>

                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="open"><i
                                    class="fas fa-file-upload"></i></button>
                        @endcan

                        <form method="post" action=" {{ url('documentos', $estudiante->id) }} " id="form">
                            @csrf
                            <!-- Modal -->
                            <div class="modal" tabindex="-1" role="dialog" id="myModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="alert alert-danger" style="display:none"></div>
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title">Subir documentos</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="custom-file">
                                                <input type="file" name="pago" class="custom-file-input" id="chooseFile">
                                                <label class="custom-file-label" for="chooseFile">Seleccionar
                                                    pago</label>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="submit" class="btn btn-primary ">
                                                    Subir Archivo
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        </form>
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
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous">
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
