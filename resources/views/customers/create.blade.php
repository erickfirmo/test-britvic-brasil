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
                <div class="card-header">Cadastrar Usuário</div>

                <div class="card-body">
                    {!! Form::open(['url' => route('customers.store'), 'method' => 'post']) !!}

                    @include('customers.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
