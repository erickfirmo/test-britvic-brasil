@csrf
<div class="row mb-3">
    {!! Form::label('vehicle_id', 'Veículo', ['for' => 'vehicle_id', 'class' => 'col-md-4 col-form-label text-md-right']) !!}

    <div class="col-md-6">

        {!! Form::select('vehicle_id', ['' => 'Selecione um veículo'] + $vehicles ?? null, ($reserve->vehicle->id ?? old('vehicle_id')) ?? app('request')->input('vehicle'), ['class' => 'form-control'. ($errors->has('vehicle_id') ? ' is-invalid' : null), 'id' => 'vehicle_id',  'autofocus' => 'autofocus', 'autocomplete' => 'vehicle_id', 'disabled' => $disabled ?? null]) !!}

        @error("vehicle_id")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    {!! Form::label('customer_id', 'Cliente', ['for' => 'customer_id', 'class' => 'col-md-4 col-form-label text-md-right']) !!}

    <div class="col-md-6">

        {!! Form::select('customer_id', ['' => 'Selecione um cliente'] + $customers ?? null, $reserve->customer->id ?? null, ['class' => 'form-control'. ($errors->has('customer_id') ? ' is-invalid' : null), 'id' => 'customer_id',  'autofocus' => 'autofocus', 'autocomplete' => 'customer_id', 'disabled' => $disabled ?? null]) !!}

        @error("customer_id")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    {!! Form::label('date', 'Data', ['for' => 'date', 'class' => 'col-md-4 col-form-label text-md-right']) !!}

    <div class="col-md-6">

        {!! Form::date('date', ($reserve->date ?? old('date')) ?? app('request')->input('date'), ['class' => 'form-control'. ($errors->has('date') ? ' is-invalid' : null), 'id' => 'date',  'autofocus' => 'autofocus', 'autocomplete' => 'date', 'disabled' => $disabled ?? null]) !!}

        @error("date")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    {!! Form::label('description', 'Descrição', ['for' => 'description', 'class' => 'col-md-4 col-form-label text-md-right']) !!}

    <div class="col-md-6">

        {!! Form::textarea('description', $reserve->description ?? old('description'), ['class' => 'form-control'. ($errors->has('description') ? ' is-invalid' : null), 'id' => 'description',  'autofocus' => 'autofocus', 'autocomplete' => 'description', 'rows' => '5', 'disabled' => $disabled ?? null]) !!}

        @error("description")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-0">
    <div class="col-md-6 offset-md-4">
        @if (app('request')->input('vehicle') !== null)
        <a href="{{ route('vehicles.show', ['vehicle' => app('request')->input('vehicle')]) }}" type="button" class="btn btn-light">
                {{ __('Voltar') }}
            </a>
        @else
            
            <a href="{{ route('reserves.index') }}" type="button" class="btn btn-light">
                {{ __('Voltar') }}
            </a>
        @endif

        @if(!isset($disabled))  
        <button type="submit" class="btn btn-primary">
            {{ __('Salvar') }}
        </button>
        @endif
    </div>
</div>

{!! Form::close() !!}