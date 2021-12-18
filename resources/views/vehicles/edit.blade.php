@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.alert')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Veículo</div>

                <div class="card-body">
                    {!! Form::model($vehicle, ['route' => ['vehicles.update', $vehicle->id], 'method' => 'PUT']) !!}

                    @method('PUT')

                    @include('vehicles.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
