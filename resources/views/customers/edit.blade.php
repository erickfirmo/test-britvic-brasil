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
                <div class="card-header">Editar Cliente</div>

                <div class="card-body">
                    {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'PUT']) !!}

                    @method('PUT')

                    @include('customers.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
