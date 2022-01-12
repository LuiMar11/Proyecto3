@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro Docentes') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('docentes.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="cedula"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>

                                <div class="col-md-6">
                                    <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror"
                                        name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula"
                                        autofocus>

                                    @error('cedula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nombre"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text"
                                        class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                        value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="apellido"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text"
                                        class="form-control @error('appellido') is-invalid @enderror" name="apellido"
                                        value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>

                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="genero"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Género') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="genero" name="genero">
                                        <option value=""></option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                    @error('genero')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nivel"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nivel académico') }}</label>
                                <div class="col-md-6">
                                    <input id="nivel" type="nivel"
                                        class="form-control @error('nivel') is-invalid @enderror" name="nivel"
                                        value="{{ old('nivel') }}" required autocomplete="nivel" autofocus>

                                    @error('nivel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="contratacion"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Contratacion') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="contratacion" name="contratacion">
                                        <option value=""></option>
                                        <option value="Planta">Planta</option>
                                        <option value="Tiempo completo">Tiempo completo</option>
                                        <option value="Medio tiempo">Medio tiempo</option>
                                        <option value="Catedra">Catedra</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                    @error('contratacion')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                      {{--       <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div> --}}

                            <div class="row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
