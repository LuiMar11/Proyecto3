<!DOCTYPE html>
<html {{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Acta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h3>{{ $acta->name }}</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Código: {{ $proyecto->codigo }}</h5>
                                    <b>Titulo:</b> {{ $proyecto->titulo }} <br>
                                    <b>Modalidad:</b> {{$proyecto->modalidad}} <br>
                                    <b>Estudiantes:</b> <br>
                                    @foreach ($estudiantes as $estudiante)
                                        @if (($estudiante->id == $proyecto->id_estudiante1) | $estudiante->id == $proyecto->id_estudiante2 | $estudiante->id == $proyecto->id_estudiante3 )
                                            {{$estudiante->nombre}} {{ $estudiante->apellido}} <br>
                                        @endif
                                    @endforeach

                                    <b>Director:</b>
                                    @foreach ($docentes as $docente)
                                        @if ($docente->id == $proyecto->id_director)
                                            {{ $docente->nombre }} {{ $docente->apellido }} <br>
                                        @endif
                                    @endforeach

                                    <b>Evaluador:</b>
                                    @foreach ($docentes as $docente)
                                        @if ($docente->id == $proyecto->id_evaluador)
                                            {{ $docente->nombre }} {{ $docente->apellido }} <br>
                                        @endif
                                    @endforeach

                                    <b>Acta aceptación: </b> {{ $proyecto->acta }} <br>
                                    <b>Estado proyecto: </b> {{ $proyecto->estado }} <br>
                                    <b>Fecha inicio: </b> {{ $proyecto->inicio }} <br>
                                    <b>Fecha finalizacion: </b> {{ $proyecto->fin}} <br>
                                    <b>Observaciones:</b> <br> {{ $proyecto->observaciones }}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            
        </div>
    </div>
</body>

</html>