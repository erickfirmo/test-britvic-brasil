@csrf
<div class="row mb-3">
    {!! Form::label('model', 'Modelo', ['for' => 'model', 'class' => 'col-md-4 col-form-label text-md-right']) !!}

    <div class="col-md-6">

        {!! Form::text('model', $vehicle->model ?? old('model'), ['class' => 'form-control'. ($errors->has('model') ? ' is-invalid' : null), 'id' => 'model',  'autofocus' => 'autofocus', 'autocomplete' => 'model', 'disabled' => $disabled ?? null]) !!}

        @error("model")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    {!! Form::label('brand', 'Marca', ['for' => 'brand', 'class' => 'col-md-4 col-form-label text-md-right']) !!}

    <div class="col-md-6">

        {!! Form::text('brand', $vehicle->brand ?? old('brand'), ['class' => 'form-control'. ($errors->has('brand') ? ' is-invalid' : null), 'id' => 'brand',  'autofocus' => 'autofocus', 'autocomplete' => 'brand', 'disabled' => $disabled ?? null]) !!}

        @error("brand")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    {!! Form::label('year', 'Ano', ['for' => 'year', 'class' => 'col-md-4 col-form-label text-md-right']) !!}

    <div class="col-md-6">

        {!! Form::text('year', $vehicle->year ?? old('year'), ['class' => 'form-control'. ($errors->has('year') ? ' is-invalid' : null), 'id' => 'year',  'autofocus' => 'autofocus', 'autocomplete' => 'year', 'disabled' => $disabled ?? null]) !!}

        @error("year")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    {!! Form::label('plate', 'Placa', ['for' => 'plate', 'class' => 'col-md-4 col-form-label text-md-right']) !!}

    <div class="col-md-6">

        {!! Form::text('plate', $vehicle->plate ?? old('plate'), ['class' => 'form-control'. ($errors->has('plate') ? ' is-invalid' : null), 'id' => 'plate',  'autofocus' => 'autofocus', 'autocomplete' => 'plate', 'disabled' => $disabled ?? null]) !!}

        @error("plate")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-0">
    <div class="col-md-6 offset-md-4">
        <a href="{{ route('vehicles.index') }}" type="button" class="btn btn-light">
            {{ __('Cancelar') }}
        </a>
        @if(!isset($disabled))  
        <button type="submit" class="btn btn-primary">
            {{ __('Salvar') }}
        </button>
        @endif
    </div>
</div>

{!! Form::close() !!}