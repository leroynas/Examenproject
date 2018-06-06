@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-lg-8 offset-lg-2">
        @component('layouts.card', ['title' => 'Producten toevoegen'])
            <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                    <div class="col-md-6">
                        <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required>

                        @if ($errors->has('type'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="manufacterer_id" class="col-md-4 col-form-label text-md-right">{{ __('Fabrikant') }}</label>

                    <div class="col-md-6">
                        <select class="form-control{{ $errors->has('manufacterer_id') ? ' is-invalid' : '' }}" id="manufacterer_id" name="manufacterer_id" required>
                            @foreach ($manufacterers as $manufacterer)
                                <option value="{{ $manufacterer->id }}"{{ old('manufacterer_id') == $manufacterer->id ? ' selected' : '' }}>{{ $manufacterer->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('manufacterer_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('manufacterer_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="purchase_price" class="col-md-4 col-form-label text-md-right">{{ __('Inkoopprijs') }}</label>

                    <div class="col-md-6">
                        <input id="purchase_price" type="text" class="form-control{{ $errors->has('purchase_price') ? ' is-invalid' : '' }}" name="purchase_price" value="{{ old('purchase_price') }}" required>

                        @if ($errors->has('purchase_price'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('purchase_price') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="selling_price" class="col-md-4 col-form-label text-md-right">{{ __('Verkoopprijs') }}</label>

                    <div class="col-md-6">
                        <input id="selling_price" type="text" class="form-control{{ $errors->has('selling_price') ? ' is-invalid' : '' }}" name="selling_price" value="{{ old('selling_price') }}" required>

                        @if ($errors->has('selling_price'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('selling_price') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-secondary">
                            {{ __('Toevoegen') }}
                        </button>
                    </div>
                </div>
            </form>
        @endcomponent
    </div>
</div>
@endsection
