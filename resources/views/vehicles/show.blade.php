@extends('layouts.app')

@section('content')
<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.alert')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informações do Veículo</div>

                <div class="card-body">
                    {!! Form::open(['url' => '#', 'disabled' => 'disabled']) !!}

                    @include('vehicles.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reservas do Veículo</div>

                <div class="card-body">
                    CALENDÁRIO DE RESERVAS
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
