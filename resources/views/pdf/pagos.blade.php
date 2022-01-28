@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header text-center">
                <h3>Pagos</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action=" " method="GET">
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
            <br>
        </div>
        <div class="row row-cols-2 row-cols-md-1 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body justify-content-center">
                        <h5 class="card-title text-center">Pagos</h5>
                        <table class="table table-hover text-center">
                            <thead class="table-ligth" style="background-color: #53cf48;">
                                <th>Documento</th>
                                <th>Nombre estudiante</th>
                                <th></th>
                            </thead>
                            <tbody class="text-center">
                                @if (count($pagos) <= 0)
                                    <tr>
                                        <td colspan="8">
                                            No se encontraron resultados
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($pagos as $pago)
                                        <tr>
                                            <td>
                                                {{ $pago->id_estudiante }}
                                            </td>
                                            <td>
                                                @foreach ($estudiantes as $estudiante)

                                                    @if ($estudiante->cedula == $pago->id_estudiante)

                                                        {{ $estudiante->nombre }}
                                                        {{ $estudiante->apellido }} <br>

                                                    @endif

                                                @endforeach

                                            </td>

                                            <td>
                                                <a class="btn btn-primary" href=" {{  }} "
                                                    target="_blank"><i class="fas fa-eye"></i></i></a>
                                            </td>


                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{-- <div class="d-flex justify-content-center">
                            {{ $pagos->links() }}
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
