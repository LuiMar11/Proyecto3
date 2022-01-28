<!DOCTYPE html>
<html {{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAP</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/manzana.png') }}">
</head>

<body>
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card">
                    <div class="login-wrap p-4 p-md-5">
                        <h3 class="mb-4 text-center"><b>Detalles Proyecto</b></h3>
                        <br>
                        <label><b>Código:</b></label>
                        <label id="codigo">{{ $proyecto->codigo }}</label>
                        <br>
                        <label><b>Titulo:</b></label>
                        <label id="titulo">{{ $proyecto->titulo }}</label>
                        <br>
                        <label><b>Modalidad:</b></label>
                        <label id="modalidad">{{ $proyecto->modalidad }}</label>
                        <br>
                        <label><b>Fecha Acta Inicio:</b></label>
                        <label id="acta">{{ $proyecto->acta }}</label>
                        <br>
                        <label><b>Estado Proyecto:</b></label>
                        <label id="estado">{{ $proyecto->estado }}</label>
                        <br>
                        <label><b>Estudiantes: </b></label>
                        @foreach ($estudiantes as $estudiante)
                            @if (($proyecto->id_estudiante1 == $estudiante->id) | ($proyecto->id_estudiante2 == $estudiante->id) | ($proyecto->id_estudiante3 == $estudiante->id))
                                <label id="estudiante">
                                    {{ $estudiante->nombre }}
                                    {{ $estudiante->apellido }}</label><br>
                            @endif
                        @endforeach

                        <label><b>Director:</b></label>
                        @foreach ($docentes as $docente)
                            @if ($proyecto->id_director == $docente->id)
                                <label id="director">{{ $docente->nombre }} {{ $docente->apellido }}</label>
                            @endif
                        @endforeach

                        <br>
                        <label><b>Evaluador:</b></label>
                        @foreach ($docentes as $docente)
                            @if ($proyecto->id_evaluador == $docente->id)
                                <label id="evaluador">{{ $docente->nombre }} {{ $docente->apellido }}</label>
                            @endif
                        @endforeach

                        <br>
                        <label class="label"><b>Observaciones:</b></label><br>
                        <textarea disabled name="observaciones" id="observaciones" cols="30"
                            rows="10">{{ $proyecto->observaciones }}</textarea>

                        <br>
                        <div class="d-flex justify-content-center mt-5">
                            <a href="{{ route('proyectos.index') }}" class="btn btn-danger"><i
                                    class="fas fa-times"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
