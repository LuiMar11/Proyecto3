<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UTS</title>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
   
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
                        <h3 class="mb-4"><b>Registro Estudiante</b></h3>
                        <form action="{{ url('estudiantes') }}" enctype="multipart/form-data" method="POST" class="signup-form">
                            @csrf
                            <div class="form-group">
                                <label class="label" for="cc"><b>Cédula</b></label>
                                <input id="cedula" name="cedula" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="label" for="email"><b>Nombres</b></label>
                                <input id="name" name="nombre" type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                            <div class="form-group">
                                <label class="label"><b>Apellidos</b></label>
                                <input id="apellido" name="apellido" type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                            <div class="form-group">
                                <label class="label" for="genero"><b>Género</b></label>
                                <select class="form-select" id="genero" name="genero">
                                    <option defaultValue></option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label" for="email"><b>Email</b></label>
                                <input id="email" name="email" class="form-control" type="email">
                            </div>
                            <div class="form-group">
                                <label class="label" for="telefono"><b>Telefono</b></label>
                                <input id="telefono" name="telefono" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label class="label" for="programa"><b>Programa</b></label>
                                <select class="form-select" id="programa" name="programa">
                                    <option defaultValue></option>
                                    <option value="Administración de Empresas">Administración de Empresas</option>
                                    <option value="Gestión Empresarial">Gestión Empresarial</option>
                                    <option value="Gestión Empresarial">Otro</option>
                                </select>
                            </div>
                            
                            <div class="form-group d-flex justify-content-center mt-5">
                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
                                <a href="{{ route('estudiantes.index') }}" class="btn btn-danger"><i
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
