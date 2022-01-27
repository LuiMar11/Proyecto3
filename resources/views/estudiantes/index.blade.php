@extends('layouts.app')
@section('content')


    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-success ">
                    <div class="card-header text-center">
                        <h3>Lista Estudiantes</h3>
                        @can('estudiantes.create')
                            <a class="btn btn-success float-right " style="background-color: #0dac54;"
                                href="{{ route('estudiantes.create') }}"><i class="fas fa-user-plus"></i></a>
                        @endcan
                        {{-- Subir archivo --}}
                        {{-- @can('estudiantes.create')
                            <td>
                                <!-- Botón para el modal -->
                                <button type="button" class="btn btn-primary float-center" data-toggle="modal" data-target="#myModal"
                                    id="open"><i class="fas fa-file-upload"></i></button>
                            </td>
                        @endcan --}}
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

                                            <form method="POST" enctype="multipart/form-data"
                                                action=" {{-- {{ route('guardarNotas', $estudiante->id) }} --}} " id="form">
                                                @csrf
                                                <!-- Modal -->
                                                <div class="modal" tabindex="-1" role="dialog" id="myModal">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="alert alert-danger" style="display:none"></div>
                                                            <div class="modal-header text-center">
                                                                <h5 class="modal-title">Subir documentos</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                <div class="custom-file">
                                                                    <input type="file" name="file" class="custom-file-input"
                                                                        id="chooseFile">
                                                                    <label class="custom-file-label"
                                                                        for="chooseFile">Seleccionar
                                                                        extendido de notas</label>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" name="submit"
                                                                        class="btn btn-primary ">
                                                                        Subir Archivo
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
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


<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous">
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
