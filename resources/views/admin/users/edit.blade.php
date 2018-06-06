@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-lg-8 offset-lg-2">
        @component('layouts.card', ['title' => 'Bewerk gebruiker '.$user->username  ])
            <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <label for="initials" class="col-md-4 col-form-label text-md-right">{{ __('Initialen') }}</label>

                    <div class="col-md-6">
                        <input id="initials" type="text" class="form-control{{ $errors->has('initials') ? ' is-invalid' : '' }}" name="initials" value="{{ $user->initials }}" required autofocus>

                        @if ($errors->has('initials'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('initials') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="prefix" class="col-md-4 col-form-label text-md-right">{{ __('Voorvoegsel') }}</label>

                    <div class="col-md-6">
                        <input id="prefix" type="text" class="form-control{{ $errors->has('prefix') ? ' is-invalid' : '' }}" name="prefix" value="{{ $user->prefix }}" required autofocus>

                        @if ($errors->has('prefix'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('prefix') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Achternaam') }}</label>

                    <div class="col-md-6">
                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}" required autofocus>

                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord herhalen') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Aanpassen') }}
                        </button>
                    </div>
                </div>
            </form>
        @endcomponent
    </div>
</div>
@endsection
