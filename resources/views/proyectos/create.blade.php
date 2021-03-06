<!DOCTYPE html>
<html {{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UTS</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
                                <label class="label"><b>Titulo</b></label><br>
                                <textarea id="titulo" name="titulo" cols="45" rows="5"> </textarea required>
                            
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Modalidad</b></label>
                                <select class="form-select" id="modalidad" name="modalidad" onchange="carg(this);" required>
                                    <option defaultValue></option>
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
                                <input id="empresa" name="empresa" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Nombres y Apellidos Estudiante 1</b></label>
                                <select class="form-select" name="id_estudiante1" id="id_estudiante1">
                                    <option defaultValue></option>
                                    @foreach ($estudiantes as $estudiante)
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
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}
                                            {{ $estudiante->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Nombres y Apellidos Estudiante 3</b></label>
                                <select class="form-select" name="id_estudiante3" id="id_estudiante3">
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

<script>
    var est1 = document.getElementById('id_estudiante1');
    var est2 = document.getElementById('id_estudiante2');
    var est3 = document.getElementById('id_estudiante3');

    function carg(elemento) {
        d = elemento.value;

        if (d == "Monografia") {
            est1.disabled = false;
            est2.disabled = false;
            est3.disabled = true;
            
        } else if (d == "Pr??ctica") {
            est1.disabled = false;
            est2.disabled = true;
            est3.disabled = true;
           
        } else if (d == "Emprendimiento") {
            est1.disabled = false;
            est2.disabled = false;
            est3.disabled = true;
           
        } else if (d == "Proyecto Investigaci??n") {
            est1.disabled = false;
            est2.disabled = false;
            est3.disabled = false;
            
        } else if (d == "Desarrollo Tecnologico") {
            est1.disabled = false;
            est2.disabled = false;
            est3.disabled = false;
           
        } else if (d == "Seminario") {
            est1.disabled = false;
            est2.disabled = true;
            est3.disabled = true;
           
        }
    }
</script>

</html>
