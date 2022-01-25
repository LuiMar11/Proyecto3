@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="card card-lg border-success text-center">
            <div class=" card-header text-center">
                <h3>Actas</h3>

            </div>
            @foreach ($actas as $acta)
                <h4><a target="_blank" href="  {{  route('show', $acta->id) }} ">{{ $acta->name }}</a></h4>
            @endforeach

        </div>
    </div>

@endsection
