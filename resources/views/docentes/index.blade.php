@extends('layouts.app')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-success">
                    <div class="card-header text-center">
                        <h3>Lista Docentes</h3>
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
                                        <button class="btn btn-outline-success" type="submit" id="search">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">

                        @if (session('info'))
                            <div class="alert alert-primary">{{ session('info') }}</div>
                        @endif
                        @if (session('delete'))
                            <div class="alert alert-danger">{{ session('delete') }}</div>
                        @endif

                        <table class="table table-hover text-center">
                            <thead class="table-ligth" style="background-color: #0dac54;">
                                <th>Cédula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Género</th>
                                <th>Email</th>
                                <th>Nivel Académico</th>
                                <th>Contratación</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
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
                                            {{-- <td>
                                    <a href="{{ url('/docentes/' . $docente->id) }}" class="btn btn-primary"><i
                                            class="fas fa-info-circle"></i></a></td> --}}
                                            <td>
                                                {{-- @can('docentes.edit') --}}
                                                    <a class="btn btn-success"
                                                        href="{{-- {{ url('/docentes/' . $docente->id . '/edit') }} --}}"><i
                                                            class="fas fa-edit"></i></a>
                                                {{-- @endcan --}}
                                            </td>
                                            <td>
                                                {{-- @can('docentes.delete') --}}
                                                    <form action="{{-- {{ url('/docentes/' . $docente->id) }} --}}" method="POST">
                                                        {{-- @csrf
                                                        {{ method_field('DELETE') }} --}}
                                                        <button class="btn btn-danger" type="submit"
                                                            onclick="return confirm('¿Desea eliminar el registro?')"><i
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
                            {{ $docentes->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
