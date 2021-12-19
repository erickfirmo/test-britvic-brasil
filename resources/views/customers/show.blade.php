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
                <div class="card-header">Informações do Usuário</div>

                <div class="card-body">
                    {!! Form::open(['url' => '#']) !!}

                    @include('customers.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
