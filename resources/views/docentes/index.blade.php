@extends('layouts.app')
@section('content')


    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-success ">
                    <div class="card-header text-center">
                        <h3>Lista Docentes</h3>
                        @can('estudiantes.create')
                            <a class="btn btn-success float-right " style="background-color: #0dac54;"
                                href="{{ route('docentes.create') }}"><i class="fas fa-user-plus"></i></a>
                        @endcan

                        <br><br>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="{{ route('docentes.index') }}" method="GET">
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
                                <th>Temas</th>
                                <th>Contratación</th>
                                <th>Información</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody class="text-center">
                                @if (count($docentes) <= 0)
                                    <tr>
                                        <td colspan="8">
                                            No se encontraron resultados
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($docentes as $docente)
                                        <tr>
                                            <td>
                                                {{ $docente->cedula }}
                                            </td>
                                            <td>
                                                {{ $docente->nombre }}
                                            </td>
                                            <td>
                                                {{ $docente->apellido }}
                                            </td>
                                            <td>
                                                {{ $docente->genero }}
                                            </td>
                                            <td>
                                                {{ $docente->email }}
                                            </td>
                                            <td>
                                                {{ $docente->nivel }}
                                            </td>
                                            <td>
                                                {{ $docente->contratacion }}
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="{{  route('docentes.show', $docente->id) }} "><i class="fas fa-info-circle"></i></a>
                                            </td>
                                            <td>
                                                @can('estudiantes.edit')
                                                    <a class="btn btn-success"
                                                        href="{{  route('docentes.edit', $docente->id) }} "><i
                                                            class="fas fa-edit"></i></a>
                                                @endcan
                                            </td>
                                            <td>
                                                @can('estudiantes.delete')
                                                    <form action="{{ route('docentes.destroy',$docente->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-danger" type="submit"
                                                            onclick="return confirm('¿Desea eliminar el docente?')"><i
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
                            {{ $docentes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
