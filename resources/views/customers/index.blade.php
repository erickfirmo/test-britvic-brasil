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
            <h3>Clientes</h3>
            <a href="{{ route('customers.create') }}" class="btn btn-primary text-light mb-4"><i class="fas fa-plus"></i>&nbsp;Novo</a>

            <div class="card">
                <div class="card-header">{{ __('Todos os Clientes') }}</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Data de Nascimento</th>
                                <th scope="col">Reservas</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($customers as $customer)
                            <tr>
                                <th scope="row">{{ $customer->id }}</th>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->getDocumentNumber() }}</td>
                                <td>{{ $customer->getDayOfBirthday() }}</td>
                                <td>{{ $customer->reserves()->count() }}</td>
                                <td>
                                    <a href="{{ route('customers.show', $customer->id) }}" class="edit btn btn-dark btn-sm"><i class="fas fa-eye"></i>&nbsp;Visualizar</a>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="edit btn btn-primary btn-sm text-light"><i class="fas fa-edit"></i>&nbsp;Editar</a>
                                    <button data-bs-target="#removeModal" data-bs-toggle="modal" data-url="{{ route('customers.destroy', $customer->id) }}" class="delete btn btn-danger btn-sm remove-button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <p class="text-center m-0">Nenhum veículo encontrado</p>
                                </td>
                            <tr>
                        @endforelse
                        </tbody>
                    </table>

                    {{ $customers->links() }}

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
                <h5 class="modal-title">Tem certeza que deseja excluir esse usuário?</h5>
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
