@extends('adminlte::page')

@section('title', 'HelpDiet')

<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon.ico') }}">
</head>

@section('content_header')

    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0">Pacientes</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="{{route('patients')}}">Pacientes</a></li> --}}
                {{-- <li class="breadcrumb-item active">Dashboard v1</li> --}}
            </ol>
        </div>
    </div>

@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{route('patients.create')}}" class="btn btn-primary">Adicionar Paciente</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                        <tr>
                            <td class="align-middle">{{ $patient->name }}</td>
                            <td class="align-middle">{{ $patient->email }}</td>
                            <td class="align-middle"><a class="btn btn-outline-primary" href="{{route('patients.show', $patient->id)}}">Ver</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
