@extends('layouts.app')
@section('content')


    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-success ">
                    <div class="card-header text-center">
                        <h3>Actas</h3>

                        <br><br>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="" method="GET">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input name="texto" id="texto" type="text" class="form-control"
                                            placeholder="Fecha Y-M-D">
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
                                <th>#</th>
                                <th>Fecha Acta</th>
                                <th></th>
                            </thead>
                            <tbody class="text-center">
                                @if (count($actas) <= 0)
                                    <tr>
                                        <td colspan="8">
                                            No se encontraron resultados
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($actas as $acta)
                                        <tr>
                                            <td>
                                                {{ $acta->id }}
                                            </td>
                                            <td>
                                                {{ $acta->name }}
                                            </td>

                                            <td>
                                                <a class="btn btn-primary" href=" {{ route('show', $acta->id) }} "
                                                    target="_blank"><i class="fas fa-eye"></i></i></a>
                                            </td>


                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $actas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
