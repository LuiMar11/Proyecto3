@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-border-success"> 
                    <div class="card-header text-center">
                        <h4> Docente {{ $docente->nombre }} {{ $docente->apellido }}</h4>
                    </div>
                    <div class="card-body justify-content-center">
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="table-ligth" style="background-color: #53cf48;">
                                    <th>Código proyecto</th>
                                    <th>Titulo proyecto</th>
                                    <th>Rol en el proyecto</th>
                                    <th>Estudiantes</th>
                                    <th></th>
                                </thead>
                            </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
