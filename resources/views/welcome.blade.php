@extends('layouts.app')
@section('content')

<div class="container">
    <h2 class="text-center"><b>Modalidades</b></h2>
    <div class="row row-cols-3">
        <div class="col">
            <div class="card opacity-75">
                <div class="card-body text-center">
                    <video class="video" width="320" height="220" controls>
                        <source src="{{ asset('videos/Monografia.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <b class="card-text text-center">Monografia</b>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card opacity-75">
                <div class="card-body text-center">
                    <video class="video" width="320" height="220" controls>
                        <source src="{{ asset('videos/Practica.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <b class="card-text">Práctica</b>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card opacity-75">
                <div class="card-body text-center">
                    <video class="video" width="320" height="220" controls>
                        <source src="{{ asset('videos/Emprendimiento.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <b class="card-text text-center">Emprendimiento</b>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card opacity-75">
                <div class="card-body text-center">
                    <video class="video" width="320" height="220" controls>
                        <source src="{{ asset('videos/Proyecto_Investigacion.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <b class="card-text text-center">Proyecto Investigación</b>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card opacity-75">
                <div class="card-body text-center">
                    <video class="video" width="320" height="220" controls>
                        <source src="{{ asset('videos/Innovacion.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <b class="card-text text-center">Desarrollo Tecnologico</b>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card opacity-75">
                <div class="card-body text-center">
                    <video class="video" width="320" height="220" controls>
                        <source src="{{ asset('videos/Seminario.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <b class="card-text text-center">Seminario</b>
                </div>
            </div>
        </div>
    </div>
@endsection