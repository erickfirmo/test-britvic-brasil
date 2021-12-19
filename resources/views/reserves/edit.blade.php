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
                <div class="card-header">Editar Reserva</div>

                <div class="card-body">
                    {!! Form::model($reserve, ['route' => ['reserves.update', $reserve->id], 'method' => 'PUT']) !!}

                    @method('PUT')

                    @include('reserves.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
