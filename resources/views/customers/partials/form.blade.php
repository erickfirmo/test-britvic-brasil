    @csrf
    <div class="row mb-3">
        {!! Form::label('name', 'Nome', ['for' => 'name', 'class' => 'col-md-4 col-form-label text-md-right']) !!}

        <div class="col-md-6">

            {!! Form::text('name', $customer->name ?? old('name'), ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : null), 'id' => 'name',  'autofocus' => 'autofocus', 'autocomplete' => 'name']) !!}

            @error("name")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        {!! Form::label('document_number', 'CPF', ['for' => 'document_number', 'class' => 'col-md-4 col-form-label text-md-right']) !!}

        <div class="col-md-6">

            {!! Form::text('document_number', $customer->document_number ?? old('document_number'), ['class' => 'form-control'. ($errors->has('document_number') ? ' is-invalid' : null), 'id' => 'document_number',  'autofocus' => 'autofocus', 'autocomplete' => 'document_number']) !!}

            @error("document_number")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        {!! Form::label('dob', 'Data de Nascimento', ['for' => 'dob', 'class' => 'col-md-4 col-form-label text-md-right']) !!}

        <div class="col-md-6">

            {!! Form::date('dob', $customer->dob ?? old('dob'), ['class' => 'form-control'. ($errors->has('dob') ? ' is-invalid' : null), 'id' => 'dob',  'autofocus' => 'autofocus', 'autocomplete' => 'dob']) !!}

            @error("dob")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <a href="{{ route('customers.index') }}" type="button" class="btn btn-light">
                {{ __('Cancelar') }}
            </a>
            <button type="submit" class="btn btn-primary">
                {{ __('Salvar') }}
            </button>
        </div>
    </div>

    {!! Form::close() !!}