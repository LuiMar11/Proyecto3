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
                        <h3 class="mb-4"><b>Agregar Proyecto </b></h3>
                        <form action="{{ route('proyectos.store') }}" method="POST" class="signup-form">
                            @csrf
                           
                            <div class="form-group">
                                <label class="label"><b>Titulo</b></label>
                                <input id="titulo" name="titulo" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Modalidad</b></label>
                                <select class="form-control" id="modalidad" name="modalidad">
                                    <option defaultValue>---Modalidad---</option>
                                    <option value="Monografia">Monografia</option>
                                    <option value="Práctica">Práctica</option>
                                    <option value="Emprendimiento">Emprendimiento</option>
                                    <option value="Proyecto Investigación">Proyecto Investigación</option>
                                    <option value="Desarrollo Tecnologico">Desarrollo Tecnologico</option>
                                    <option value="Seminario">Seminario</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Nombres y Apellidos Estudiante 1</b></label>
                                <select class="form-control" name="id_estudiante1" id="id_estudiante1">
                                    <option defaultValue></option>
                                    @foreach ($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}
                                            {{ $estudiante->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Nombres y Apellidos Estudiante 3</b></label>
                                <select class="form-control" name="id_estudiante2" id="id_estudiante2">
                                    <option defaultValue></option>
                                    @foreach ($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}
                                            {{ $estudiante->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Nombres y Apellidos Estudiante 3</b></label>
                                <select class="form-control" name="id_estudiante3" id="id_estudiante3">
                                    <option defaultValue></option>
                                    @foreach ($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}
                                            {{ $estudiante->apellido }}</option>
                                    @endforeach
                                </select>
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
