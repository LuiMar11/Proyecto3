<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UTS</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{{ asset('img/manzana.png') }}}">
</head>

<body>
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card">
                <div class="login-wrap p-4 p-md-5">
                    <h3 class="mb-4 text-center"><b>Editar Docente</b></h3>
                    <form action="{{ url('/docentes/'.$docente->id) }}" method="POST" class="signup-form">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label class="label" for="cc"><b>Cédula</b></label>
                            <input id="cedula" name="cedula" type="number" class="form-control" value="{{ $docente->cedula }}">
                        </div>
                        <div class="form-group">
                            <label class="label" for="email"><b>Nombres</b></label>
                            <input id="nombre" name="nombre" type="text" class="form-control" value="{{ $docente->nombre }}">
                        </div>
                        <div class="form-group">
                            <label class="label"><b>Apellidos</b></label>
                            <input id="apellido" name="apellido" type="text" class="form-control" value="{{ $docente->apellido }}">
                        </div>
                        <div class="form-group">
                            <label class="label" for="genero"><b>Género</b></label>
                            <select class="form-control" id="genero" name="genero">
                                <option defaultValue>{{ $docente->genero }}</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label" for="email"><b>Email</b></label>
                            <input id="email" name="email" class="form-control" type="email" value="{{ $docente->email }}">
                        </div>
                        <div class="form-group">
                            <label class="label" for="profesion"><b>Nivel acádemico</b></label>
                            <input id="nivel" name="nivel" class="form-control" type="text" value="{{ $docente->nivel }}">
                        </div>
                        <div class="form-group">
                            <label class="label" for="contratacion"><b>Contratación</b></label>
                            <select class="form-control" id="contratacion" name="contratacion">
                                <option defaultValue>{{ $docente->contratacion }}</option>
                                <option value="Planta">Planta</option>
                                <option value="Tiempo Completo">Tiempo Completo</option>
                                <option value="Medio Tiempo">Medio Tiempo</option>
                                <option value="Cátedra">Cátedra</option>
                            </select>
                        </div>
                        <div class=" d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
                            
                            <a href="{{ route('docentes.index') }}" class="btn btn-danger"><i
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