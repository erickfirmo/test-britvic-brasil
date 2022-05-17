@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.alert')
        </div>
    </div>


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
                                <th scope="col">Reservas</th>
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
                                <td>{{ $vehicle->reserves()->count() }}</td>
                                <td>
                                    <a href="{{ route('vehicles.show', $vehicle->id) }}" class="edit btn btn-dark btn-sm"><i class="fas fa-eye"></i>&nbsp;Visualizar</a>
                                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="edit btn btn-primary btn-sm text-light"><i class="fas fa-edit"></i>&nbsp;Editar</a>
                                    <button data-bs-target="#removeModal" data-bs-toggle="modal" data-url="{{ route('vehicles.destroy', $vehicle->id) }}" class="delete btn btn-danger btn-sm remove-button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
                                </td>
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

                    {{ $vehicles->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@push('components')
<div class="modal fade" tabindex="-1" id="removeModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tem certeza que deseja excluir esse veículo?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Esta ação não pode ser desfeita!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="remove-confirmation">Excluir</button>
            </div>
        </div>
    </div>
</div>

<form action="#" method="POST" class="d-none" id="remove-form">
    @csrf
    {{ method_field('DELETE') }}
</form>
@endpush

@push('scripts')
<script>
var removeForm = document.getElementById('remove-form')
var removeConfirmation = document.getElementById('remove-confirmation');

// set remove form action based on button remove
document.addEventListener("DOMContentLoaded", function(e) {
    document.querySelectorAll('.remove-button').forEach(button => {
        button.addEventListener('click', event => {
            removeForm.setAttribute('action', button.dataset.url)
        })
    })
})

// submit remove form when confirm in modal
removeConfirmation.addEventListener('click', event => {
    removeForm.submit()
})
</script>
@endpush

@endsection
