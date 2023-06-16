@extends('adminlte::page')

@section('title', 'Pacientes')

<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon.ico') }}">
</head>

@section('content_header')

<div class="row">
    <div class="col-sm-6">
        <h1 class="m-0">Pacientes</h1>
    </div>
    <div class="col-sm-6"></div>
</div>

@stop

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{route('patients.create')}}" class="btn btn-outline-primary">Adicionar Paciente</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                    @php
                    $dataFornecida = $patient->birth ?? now()->format('Y-m-d');

                    // Criar um objeto Carbon a partir da data fornecida
                    $dataNascimento = \Carbon\Carbon::createFromFormat('Y-m-d', $dataFornecida);

                    // Obter a data atual
                    $dataAtual = \Carbon\Carbon::now();

                    // Calcular a diferença entre as datas
                    $diferenca = $dataNascimento->diff($dataAtual);

                    // Obter a idade
                    $idade = $diferenca->y;
                    @endphp
                    <tr>
                        <td class="align-middle">{{ $patient->name }} - {{$idade}} anos</td>
                        <td class="align-middle text-right"><a class="btn btn-outline-primary"
                                href="{{route('patients.show', $patient->id)}}">Ver</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop