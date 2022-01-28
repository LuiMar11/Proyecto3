<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


@extends('layouts.app')
@section('content')


    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-success ">
                    <div class="card-header text-center">
                        <h3>Lista Estudiantes</h3>
                        <br>
                        @can('estudiantes.create')
                            <a class="btn btn-success float-right " style="background-color: #0dac54;"
                                href="{{ route('estudiantes.create') }}"><i class="fas fa-user-plus"></i></a>
                        @endcan
                        {{-- Subir archivo --}}
                        @can('estudiantes.create')
                            <td>
                                <!-- Botón -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    <i class="fas fa-file-upload"></i>
                                </button>
                            </td>

                            <form method="POST" enctype="multipart/form-data" action=" {{ url('/uploadNotas') }} "
                                id="form">
                                @csrf
                                <!-- The Modal -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header-center">
                                                <h4 class="modal-title">Upload extendido de notas</h4>

                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <input type="file" name="file" id="file" class="form-control">
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="">Nombres y Apellidos del estudiante</label>
                                                        <select name="id_estudiante" id="id_estudiante" class="form-control">
                                                            <option defaultValue></option>
                                                            @foreach ($estudiantes as $estudiante)
                                                                <option value="{{ $estudiante->cedula }}">
                                                                    {{ $estudiante->nombre }}
                                                                    {{ $estudiante->apellido }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="submit" class="btn btn-success"
                                                    style="background-color: #0dac54;">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        @endcan

                        <br><br>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="{{ route('estudiantes.index') }}" method="GET">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input name="texto" id="texto" type="text" class="form-control"
                                            placeholder="Cédula, Nombres o Apellidos">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-success" type="submit"
                                                id="search">Buscar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body justify-content-center">
                        <table class="table table-hover text-center">
                            <thead class="table-ligth" style="background-color: #53cf48;">
                                <th>Cédula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Género</th>
                                <th>Email</th>
                                <th>Programa</th>
                                <th>Estado</th>
                                <th>Información</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody class="text-center">
                                @if (count($estudiantes) <= 0)
                                    <tr>
                                        <td colspan="8">
                                            No se encontraron resultados
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($estudiantes as $estudiante)
                                        <tr>
                                            <td>
                                                {{ $estudiante->cedula }}
                                            </td>
                                            <td>
                                                {{ $estudiante->nombre }}
                                            </td>
                                            <td>
                                                {{ $estudiante->apellido }}
                                            </td>
                                            <td>
                                                {{ $estudiante->genero }}
                                            </td>
                                            <td>
                                                {{ $estudiante->email }}
                                            </td>
                                            <td>
                                                {{ $estudiante->programa }}
                                            </td>
                                            <td>
                                                {{ $estudiante->estado }}
                                            </td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('estudiantes.show', $estudiante->id) }} "><i
                                                        class="fas fa-info-circle"></i></a>
                                            </td>
                                            <td>
                                                @can('estudiantes.edit')
                                                    <a class="btn btn-success"
                                                        href="{{ url('/estudiantes/' . $estudiante->id . '/edit') }}"><i
                                                            class="fas fa-edit"></i></a>
                                                @endcan
                                            </td>
                                            <td>
                                                @can('estudiantes.delete')
                                                    <form action="{{ url('/estudiantes/' . $estudiante->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-danger" type="submit"
                                                            onclick="return confirm('¿Desea eliminar el estudiante?')"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $estudiantes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
