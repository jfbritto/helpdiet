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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Gênero</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="">Selecione</option>
                            <option value="f">Feminino</option>
                            <option value="m">Masculino</option>
                            <option value="o">Outro</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birth">Data de Nascimento</label>
                        <input type="date" class="form-control" id="birth" name="birth">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Telefone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite seu telefone">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-primary">Adicionar</button>
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
