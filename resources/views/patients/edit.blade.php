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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome" value="{{$patient->name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Gênero</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="">Selecione</option>
                            <option value="f" @if ($patient->gender == 'f') selected @endif>Feminino</option>
                            <option value="m" @if ($patient->gender == 'm') selected @endif>Masculino</option>
                            <option value="o" @if ($patient->gender == 'o') selected @endif>Outro</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birth">Data de Nascimento</label>
                        <input type="date" class="form-control" id="birth" name="birth" value="{{$patient->birth}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Telefone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite seu telefone" value="{{$patient->phone}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" value="{{$patient->email}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" value="{{$patient->cpf}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-primary">Salvar</button>
                    <a class="btn btn-outline-secondary" href="{{route('patients.show', $patient->id)}}">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('js')
<script>
    const cpfInput = document.getElementById('cpf');

    cpfInput.addEventListener('input', formatCPF);

    function formatCPF() {
        let cpf = cpfInput.value.replace(/\D/g, '');
        cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
        cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        cpfInput.value = cpf;
    }

    cpfInput.addEventListener('blur', validateCPF);

    function validateCPF() {
    const cpf = cpfInput.value.replace(/\D/g, '');

    if (cpf.length !== 11 || /^(.)\1+$/.test(cpf)) {
        cpfInput.setCustomValidity('CPF inválido');
    } else {
        cpfInput.setCustomValidity('');
    }
    }
</script>
@stop
