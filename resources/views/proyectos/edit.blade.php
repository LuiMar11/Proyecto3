<!DOCTYPE html>
<html {{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAP</title>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/manzana.png') }}">
</head>

<body style=" 
background-image           : url('https://noticias.canaltro.com/wp-content/uploads/2021/07/IMG-20200815-WA0004.jpg');
 background-position: center center;
 background-size: cover;">
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card">
                    <div class="login-wrap p-4 p-md-5">
                        <h3 class="mb-4 text-center"><b>Editar Proyecto</b></h3>
                        <form action="{{ url('/proyectos/' . $proyecto->id) }}" method="POST" class="signup-form">
                            @csrf
                            {{ method_field('PATCH') }}
                            <label class="label"><b>C??digo</b></label>


                            @if ($proyecto->estado == 'Rechazado')
                                <input type="text" id="codigo" name="codigo" value="{{ $proyecto->codigo }}">

                            @else
                                <a id="cod " class=" text-dark"
                                    href="{{ App\Models\Proyecto::crearCodigo($proyecto) }}"></a>
                                <input type="text" id="codigo" name="codigo" value=" {{ $proyecto->codigo }}"
                                    disabled>
                            @endif

                            <div class="form-group">
                                <label class="label"><b>Titulo</b></label> <br>
                                <textarea id="titulo" name="titulo" cols="45"
                                    rows="5">{{ $proyecto->titulo }} </textarea>
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Nombres y Apellidos Estudiante 1</b></label>
                                <select class="form-select" name="id_estudiante1" id="id_estudiante1">
                                    <option defaultValue></option>
                                    @foreach ($estudiantes as $estudiante)
                                        @if ($proyecto->id_estudiante1 == $estudiante->id)
                                            <option selected value="{{ $estudiante->id }}">
                                                {{ $estudiante->nombre }}
                                                {{ $estudiante->apellido }}</option>
                                        @endif
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}
                                            {{ $estudiante->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Nombres y Apellidos Estudiante 2</b></label>
                                <select class="form-select" name="id_estudiante2" id="id_estudiante2">
                                    <option defaultValue></option>
                                    @foreach ($estudiantes as $estudiante)
                                        @if ($proyecto->id_estudiante2 == $estudiante->id)
                                            <option selected value="{{ $estudiante->id }}">
                                                {{ $estudiante->nombre }}
                                                {{ $estudiante->apellido }}</option>
                                        @endif
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}
                                            {{ $estudiante->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Nombres y Apellidos Estudiante 3</b></label>
                                <select class="form-select" name="id_estudiante2" id="id_estudiante2">
                                    <option defaultValue></option>
                                    @foreach ($estudiantes as $estudiante)
                                        @if ($proyecto->id_estudiante2 == $estudiante->id)
                                            <option selected value="{{ $estudiante->id }}">
                                                {{ $estudiante->nombre }}
                                                {{ $estudiante->apellido }}</option>
                                        @endif
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}
                                            {{ $estudiante->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Modalidad</b></label>
                                <select class="form-select" id="modalidad" name="modalidad">
                                    <option defaultValue>{{ $proyecto->modalidad }}</option>
                                    <option value="Monografia">Monografia</option>
                                    <option value="Pr??ctica">Pr??ctica</option>
                                    <option value="Emprendimiento">Emprendimiento</option>
                                    <option value="Proyecto Investigaci??n">Proyecto Investigaci??n</option>
                                    <option value="Desarrollo Tecnologico">Desarrollo Tecnologico</option>
                                    <option value="Seminario">Seminario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Empresa</b></label>
                                <input id="empresa" name="empresa" type="text" class="form-control"
                                    value="{{ $proyecto->empresa }}">
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Fecha inscripci??n (Aceptado o Rechazado)</b></label>
                                <input id="acta" name="acta" type="date" class="form-control"
                                    value="{{ $proyecto->acta }}">
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Fecha Inicio</b></label>
                                <input id="inicio" name="inicio" type="date" class="form-control"
                                    value="{{ $proyecto->inicio }}">
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Fecha Finalizaci??n</b></label>
                                <input id="fin" name="fin" type="date" class="form-control"
                                    value="{{ $proyecto->fin }}">
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Estado</b></label>
                                <select class="form-select" id="estado" name="estado" onchange="carg(this);">
                                    <option defaultValue>{{ $proyecto->estado }}</option>
                                    <option value="Inscripcion Aprobada">Inscripci??n Aprobada</option>
                                    <option value="Inscripcion Rechazada">Inscripci??n Rechazada</option>
                                    <option value="Inscripcion Cancelada">Inscripci??n Cancelada</option>

                                    <option value="FDC124 Aprobada">FDC124 Aprobada</option>
                                    <option value="FDC124 No aprobada">FDC124 Rechazada</option>
                                    <option value="FDC124 Cancelada">FDC124 Cancelada</option>

                                    <option value="FDC125 Aprobada">FDC125 Aprobada</option>
                                    <option value="FDC125 No aprobada">FDC125 Rechazada</option>
                                    <option value="FDC125 Cancelada">FDC125 Cancelada</option>

                                    <option value="FDC126 Aprobada">FDC126 Aprobada</option>
                                    <option value="FDC126 No aprobada">FDC126 Rechazada</option>

                                    <option value="FDC127 Aprobada">FDC127 Aprobada</option>
                                    <option value="FDC127 No aprobada">FDC127 Rechazada</option>
                                    <option value="FDC127 Cancelada">FDC127 Cancelada</option>

                                    <option value="FDC128-129 Aprobada">FDC128-129 Aprobada</option>
                                    <option value="FDC128-129 No aprobada">FDC128-129 Rechazada</option>
                                    <option value="FDC128-129 Cancelada">FDC128-129 Cancelada</option>

                                    <option value="Prorroga">Pr??rroga</option>
                                    <option value="Terminado">Terminado</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="label"><b>Director</b></label>
                                <select class="form-select" name="id_director" id="id_director">
                                    <option defaultValue></option>
                                    @foreach ($docentes as $docente)
                                        @if ($proyecto->id_director == $docente->id)
                                            <option selected value="{{ $docente->id }}">{{ $docente->nombre }}
                                                {{ $docente->apellido }}</option>
                                        @endif
                                        <option value="{{ $docente->id }}">{{ $docente->nombre }}
                                            {{ $docente->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Evaluador</b></label>
                                <select class="form-select" name="id_evaluador" id="id_evaluador">
                                    <option defaultValue></option>
                                    @foreach ($docentes as $docente)
                                        @if ($proyecto->id_evaluador == $docente->id)
                                            <option selected value="{{ $docente->id }}">{{ $docente->nombre }}
                                                {{ $docente->apellido }}</option>
                                        @endif
                                        <option value="{{ $docente->id }}">{{ $docente->nombre }}
                                            {{ $docente->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="label"><b>Observaciones:</b></label>

                                <textarea class="form-control" name="observaciones" id="observaciones" cols="30"
                                    rows="10">{{ $proyecto->observaciones }}</textarea>

                            </div>

                            <div class="form-group d-flex justify-content-center mt-5">
                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
                                <a href="{{ route('proyectos.index') }}" class="btn btn-danger"><i
                                        class="fas fa-times"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    var director = document.getElementById('id_director');
    var evaluador = document.getElementById('id_evaluador');

    function carg(elemento) {

        d = elemento.value;

        if (d == "Rechazado") {
            director.disabled = true;
            evaluador.disabled = true;

        } else if (d == "Aprobado") {
            director.disabled = false;
            evaluador.disabled = false;
        }
    }
</script>


</html>
