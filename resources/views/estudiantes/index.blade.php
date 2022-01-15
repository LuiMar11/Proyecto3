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
                                                <a class="btn btn-primary" href="{{ url('/estudiantes/' . $estudiante->id) }}"><i class="fas fa-info-circle"></i></a>
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
                                                            onclick="return confirm('¿Desea eliminar el registro?')"><i
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
