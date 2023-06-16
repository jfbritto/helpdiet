@extends('adminlte::page')

@section('title', "Paciente $patient->name")

<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon.ico') }}">
</head>

@section('content_header')
<div class="row">
    <div class="col-sm-6">
        <h1 class="m-0">Paciente</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('patients')}}">Pacientes</a></li>
            <li class="breadcrumb-item active">{{$patient->name}}</li>
        </ol>
    </div>
</div>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome"
                        value="{{$patient->name}}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Gênero</label>
                    <select class="form-control" id="gender" name="gender" readonly>
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
                    <input type="date" class="form-control" id="birth" name="birth" value="{{$patient->birth}}" readonly
                        disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Telefone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite seu telefone"
                        value="{{$patient->phone}}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email"
                        value="{{$patient->email}}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF"
                        value="{{$patient->cpf}}" readonly>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row align-items-center">
                    <div class="col">
                        <a class="btn btn-outline-warning" href="{{route('patients.edit', $patient->id)}}">Editar</a>
                    </div>
                    <div class="col-auto">
                        <form id="deleteForm" action="{{route('patients.destroy', $patient->id)}}" method="POST">
                            @csrf()
                            @method('DELETE')
                            <button class="btn btn-outline-danger" type="button"
                                onclick="confirmDelete()">Deletar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@stop

@section('js')
<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Tem certeza?',
            text: 'Essa ação é irreversível.',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sim, deletar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>
@stop