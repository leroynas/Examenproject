@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-lg-8 offset-lg-2">
        @component('layouts.card', ['title' => 'Fabrikant wijzigen'])
            <form method="post" action="{{ route('manufacterers.update', ['manufacterer' => $manufacterer->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fabrikant') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $manufacterer->name }}" required>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefoonnummer') }}</label>

                    <div class="col-md-6">
                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $manufacterer->phone }}" required>

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-secondary">
                            {{ __('Wijzigen') }}
                        </button>
                    </div>
                </div>
            </form>
        @endcomponent
    </div>
</div>
@endsection
