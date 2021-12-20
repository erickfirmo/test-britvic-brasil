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
                    {!! Form::open(['url' => '#']) !!}

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
                <div class="card-header">Reservas do Veículo - ({{ $month }})</div>

                <div class="card-body">
                <a href="{{ route('vehicles.show', ['vehicle' => $vehicle->id, 'month' => $lastMonth]) }}" class="btn btn-light mb-4"><i class="fas fa-arrow-left"></i>&nbsp;Mês Anterior</a>
                <a href="{{ route('vehicles.show', ['vehicle' => $vehicle->id, 'month' => $nextMonth]) }}" class="btn btn-light mb-4">Mês Seguinte&nbsp;<i class="fas fa-arrow-right"></i></a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <!--th scope="col">#</th-->
                                <th scope="col">Data</th>
                                <th scope="col">Status</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($reserveDays as $date => $reserve)
                                <tr>
                                @if($reserve)
                                    <td>{{ $reserve->getDate() }}</td>
                                    <td>Indisponível</td>
                                    <td>{{ $reserve->customer->name }}</td>
                                    <td>
                                        <a href="{{ route('reserves.show', $reserve->id) }}" class="edit btn btn-dark btn-sm"><i class="fas fa-eye"></i>&nbsp;Visualizar</a>
                                        <a href="{{ route('reserves.edit', $reserve->id) }}" class="edit btn btn-primary btn-sm text-light"><i class="fas fa-edit"></i>&nbsp;Editar</a>
                                        <button data-bs-target="#removeModal" data-bs-toggle="modal" data-url="{{ route('reserves.destroy', $reserve->id) }}" class="delete btn btn-danger btn-sm remove-button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
                                    </td>
                                @else
                                    <td>{{ $date }}</td>
                                    <td colspan="2">Disponível</td>
                                    <td>
                                        <a href="#" class="edit btn btn-dark btn-sm"><i class="fas fa-eye"></i>&nbsp;Reservar</a>
                                    </td>
                                @endif
                                </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <p class="text-center m-0">Nenhum veículo encontrado</p>
                                </td>
                            <tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
