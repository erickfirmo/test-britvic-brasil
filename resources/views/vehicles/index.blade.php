@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.alert')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3>Veículos</h3>
            <a href="{{ route('vehicles.create') }}" class="btn btn-primary text-light mb-4"><i class="fas fa-plus"></i>&nbsp;Novo</a>

            <div class="card">
                <div class="card-header">{{ __('Todos os Veículos') }}</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Ano</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($vehicles as $vehicle)
                            <tr>
                                <th scope="row">{{ $vehicle->id }}</th>
                                <td>{{ $vehicle->model }}</td>
                                <td>{{ $vehicle->brand }}</td>
                                <td>{{ $vehicle->year }}</td>
                                <td>{{ $vehicle->plate }}</td>
                                <td>
                                <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="edit btn btn-info btn-sm text-light"><i class="fas fa-edit"></i>&nbsp;Editar</a>
                                <button href="javascript:void(0)" onclick="//submitAction(this)" data-method="DELETE" data-url="{{ route('vehicles.destroy', $vehicle->id) }}" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
                                </td>
                            </tr>
                        @empty
                            <p>No users</p>
                        @endforelse
                        </tbody>
                    </table>

                    {{ $vehicles->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
