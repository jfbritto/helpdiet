@extends('adminlte::page')

@section('title', 'HelpDiet')

<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon.ico') }}">
</head>

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0">Editando Paciente</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('patients')}}">Pacientes</a></li>
                <li class="breadcrumb-item"><a href="{{route('patients.show', $patient->id)}}">{{$patient->name}}</a></li>
                <li class="breadcrumb-item active">Editando Paciente</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('patients.update', $patient->id)}}" method="POST">
            @csrf()
            @method('PUT')
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nome" name="name" value="{{$patient->name}}">
                </div>
                <div class="col">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{$patient->email}}">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a class="btn btn-outline-secondary" href="{{route('patients.show', $patient->id)}}">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
