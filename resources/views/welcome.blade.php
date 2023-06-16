@extends('adminlte::page')

@section('title', 'Home')

<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon.ico') }}">
</head>

@section('content_header')
<h1>Home</h1>
@stop

@section('content')

<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$totalPatients}}</h3>
                <p>Pacientes</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{route('patients')}}" class="small-box-footer">Mais informações <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>

    </div>

    <div class="col-lg-3 col-6">

        {{-- <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div> --}}
    </div>

    <div class="col-lg-3 col-6">

        {{-- <div class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>
                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div> --}}
    </div>

    <div class="col-lg-3 col-6">

        {{-- <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div> --}}
    </div>

</div>

@stop