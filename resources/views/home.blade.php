@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-success">
                    <div class="card-header" style="background-color: #53cf48;">{{ __('Bienvenid@') }}</div>
                    <div class="card-body">
                        
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="text-justify">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</p>

                        @if (Auth::user()->permisos == 'Docente')
                            <p>Ahora puede inscribirse en la lista de docentes</p>
                        @endif

                        @if (Auth::user()->permisos == 'Estudiante')
                            <p>Ahora puede inscribirse en la lista de estudiantes para luego inscribir su propuesta de grado
                            </p>
                        @endif

                        @if (Auth::user()->permisos == 'Admin')
                            <p>Admin</p>
                        @endif

                        @if (Auth::user()->permisos == 'Comite')
                            <p>Cómite </p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
