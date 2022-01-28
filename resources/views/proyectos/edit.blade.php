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
                        <h3 class="mb-4 text-center"><b>Editar Proyecto</b></h3>
                        <form action="{{ url('/proyectos/' . $proyecto->id) }}" method="POST" class="signup-form">
                            @csrf
                            {{ method_field('PATCH') }}
                            <label class="label"><b>Código</b></label>
                            <a class=" text-dark"
                                href="{{ App\Models\Proyecto::crearCodigo($proyecto) }}"></a>
                            <label id="codigo" name="codigo">{{ $proyecto->codigo }} </label>

                            <div class="form-group">
                                <label class="label"><b>Titulo</b></label>
                                <input id="titulo" name="titulo" type="text" class="form-control"
                                    value="{{ $proyecto->titulo }}">
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Modalidad</b></label>
                                <select class="form-control" id="modalidad" name="modalidad">
                                    <option defaultValue>{{ $proyecto->modalidad }}</option>
                                    <option value="Monografia">Monografia</option>
                                    <option value="Práctica">Práctica</option>
                                    <option value="Emprendimiento">Emprendimiento</option>
                                    <option value="Proyecto Investigación">Proyecto Investigación</option>
                                    <option value="Desarrollo Tecnologico">Desarrollo Tecnologico</option>
                                    <option value="Seminario">Seminario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Fecha Acta Inicio</b></label>
                                <input id="acta" name="acta" type="date" class="form-control"
                                    value="{{ $proyecto->acta }}">
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Fecha Inicio</b></label>
                                <input id="inicio" name="inicio" type="date" class="form-control"
                                    value="{{ $proyecto->inicio }}">
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Fecha Finalización</b></label>
                                <input id="fin" name="fin" type="date" class="form-control"
                                    value="{{ $proyecto->fin }}">
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Estado</b></label>
                                <select class="form-control" id="estado" name="estado">
                                    <option defaultValue>{{ $proyecto->estado }}</option>
                                    <option value="Aprobado">Aprobado</option>
                                    <option value="Rechazado">Rechazado</option>
                                    <option value="Cancelado">Cancelado</option>
                                    <option value="Prorroga">Prorroga</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="label"><b>Director</b></label>
                                <select class="form-control" name="id_director" id="id_director">
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
                                <select class="form-control" name="id_evaluador" id="id_evaluador">
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

</html>
