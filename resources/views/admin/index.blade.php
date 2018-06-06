@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @include('layouts.locations')


    <div class="row">
        <div class="col-md-4">
            @component('layouts.card', ['title' => 'Voorraad checker'])
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="post" action="{{ route('inventory.show') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Locatie') }}</label>

                        <div class="col-md-6">
                            <select class="form-control{{ $errors->has('location_id') ? ' is-invalid' : '' }}" id="location_id" name="location_id" required>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}"{{ old('location_id') == $location->id ? ' selected' : '' }}>{{ $location->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('location_id'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('location_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">{{ __('Product') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('product_id') ? ' is-invalid' : '' }}" id="product_id" name="product_id" required>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"{{ old('product_id') == $product->id ? ' selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('product_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('product_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-secondary">
                                {{ __('Check') }}
                            </button>
                        </div>
                    </div>
                </form>
            @endcomponent
        </div>
        <div class="col-md-8">
            @component('layouts.card', ['title' => 'Lage voorraad'])
                <table class="table table-borderless m-0">
                  <thead>
                      <tr>
                          <th>Product</th>
                          <th>Locatie</th>
                          <th>Aantal</th>
                          <th>Minimaal</th>
                          <th>Te bestellen</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($locations as $location)
                        @foreach ($location->products as $product)
                            @if ($product->pivot->min_count > $product->pivot->count)
                                <tr>
                                  <td>{{ $product->name }}</td>
                                  <td>{{ $location->name }}</td>
                                  <td>{{ $product->pivot->count }}</td>
                                  <td>{{ $product->pivot->min_count }}</td>
                                  <td>{{ $product->pivot->min_count - $product->pivot->count }}</td>
                                  <td class="text-right">
                                    <a href="{{ route('inventory.edit', ['location' => $location->id, 'product' => $product->id]) }}"class="text-primary mr-2">
                                        <i class="far fa-edit"></i>
                                    </a>
                                  </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                  </tbody>
                </table>
            @endcomponent
        </div>
    </div>
</div>
@endsection
