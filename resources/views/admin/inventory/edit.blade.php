@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-lg-8 offset-lg-2">
        @component('layouts.card', ['title' => 'Producten koppelen'])
            <form method="post" action="{{ route('inventory.update', ['location' => $location->id, 'product' => $product->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <label for="count" class="col-md-4 col-form-label text-md-right">{{ __('Aantal') }}</label>

                    <div class="col-md-6">
                        <input id="count" type="number" class="form-control{{ $errors->has('count') ? ' is-invalid' : '' }}" name="count" value="{{ $product->pivot->count }}" required>

                        @if ($errors->has('count'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('count') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="min_count" class="col-md-4 col-form-label text-md-right">{{ __('Minimaal') }}</label>

                    <div class="col-md-6">
                        <input id="min_count" type="number" class="form-control{{ $errors->has('min_count') ? ' is-invalid' : '' }}" name="min_count" value="{{ $product->pivot->min_count }}" required>

                        @if ($errors->has('min_count'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('min_count') }}</strong>
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
