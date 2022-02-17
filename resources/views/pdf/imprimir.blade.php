<!DOCTYPE html>
<html {{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Acta</title>
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        header {
            position: fixed;
            top: 1cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="https://www.uts.edu.co/sitio/wp-content/uploads/2021/02/Logo-UTS-1.png" width="90" height="70">
                </div>
                <div class="col text-center">
                    <p>SOPORTE AL SISTEMA INTEGRADO DE GESTIÓN</p>
                    <h5 class="text-center">{{ $acta->name }}</h5>
                </div>


            </div>

        </div>
    </header>
    <main>
        <div class="container">
            <div class="table-responsive">
                <table class="table table-borderless">
                    @foreach ($proyectos as $proyecto)
                        <tr>
                            <td>
                                <div class="card border-success mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Código: {{ $proyecto->codigo }}</h5>
                                        <b>Titulo:</b> {{ $proyecto->titulo }} <br>
                                        <b>Modalidad:</b> {{ $proyecto->modalidad }} <br>
                                        <b>Estudiantes:</b> <br>
                                        @foreach ($estudiantes as $estudiante)
                                            @if (($estudiante->id == $proyecto->id_estudiante1) | ($estudiante->id == $proyecto->id_estudiante2) | ($estudiante->id == $proyecto->id_estudiante3))
                                                {{ $estudiante->nombre }} {{ $estudiante->apellido }} <br>
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
                                        <b>Fecha finalizacion: </b> {{ $proyecto->fin }} <br>
                                        <b>Observaciones:</b> <br> {{ $proyecto->observaciones }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </main>
    <script type="text/php">
        if ( isset($pdf) ) { 
                                                            $pdf->page_script(' 
                                                                if ($PAGE_COUNT > 1) {
                                                                    $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                                                                    $size = 10;
                                                                    $pageText = "PÁGINA " . $PAGE_NUM . " DE " . $PAGE_COUNT;
                                                                    $y = 30;
                                                                    $x = 500;
                                                                    $pdf->text($x, $y, $pageText, $font, $size);
                                                                } ');
                                                        }
                                                                </script>
</body>

</html>
