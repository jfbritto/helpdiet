@extends('adminlte::page')

@section('title', 'HelpDiet')

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
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <a class="btn btn-outline-warning" href="{{route('patients.edit', $patient->id)}}">Editar</a>
            </div>
            <div class="col-auto">
                <form id="deleteForm" action="{{route('patients.destroy', $patient->id)}}" method="POST">
                    @csrf()
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type="button" onclick="confirmDelete()">Deletar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" value="{{$patient->name}}" readonly>
            </div>
            <div class="col">
                <input type="email" class="form-control" value="{{$patient->email}}" readonly>
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
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sim, deletar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>
@stop
