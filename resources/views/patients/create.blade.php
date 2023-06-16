@extends('adminlte::page')

@section('title', 'HelpDiet')

<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon.ico') }}">
</head>

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0">Novo Paciente</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('patients')}}">Pacientes</a></li>
                <li class="breadcrumb-item active">Novo Paciente</li>
            </ol>
        </div>
    </div>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{route('patients.store')}}" method="POST">
            @csrf()
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nome" name="name">
                </div>
                <div class="col">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@stop
