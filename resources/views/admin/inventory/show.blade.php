@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="col-md-8 offset-md-2">
    @component('layouts.card', ['title' => 'Voorraad '.$location->name.' - '.$product->name])
        <table class="table table-borderless m-0">
          <tbody>
                <tr>
                  <th>Product</th>
                  <td>{{ $product->name }}</td>
                </tr>
                <tr>
                  <th>Type</th>
                  <td>{{ $product->type }}</td>
                </tr>
                <tr>
                  <th>Fabrikant</th>
                  <td>{{ $product->manufacterer->name }}</td>
                </tr>
                <tr>
                  <th>Aantal</th>
                  <td>{{ $count = $product->pivot->count }}</td>
                </tr>
                <tr>
                  <th>Min aantal</th>
                  <td>{{ $count = $product->pivot->min_count }}</td>
                </tr>
                <tr>
                  <th>Inkoopprijs</th>
                  <td>&euro; {{ number_format($product->purchase_price / 100, 2, ',', '.') }}</td>
                </tr>
                <tr>
                  <th>Verkoopprijs</th>
                  <td>&euro; {{ number_format($product->selling_price / 100, 2, ',', '.') }}</td>
                </tr>
                <tr>
                  <th>Inkoopwaard</th>
                  <td>&euro; {{ number_format(($product->purchase_price / 100) * $count, 2, ',', '.') }}</td>
                </tr>
                <tr>
                  <th>Verkoopwaarde</th>
                  <td>&euro; {{ number_format(($product->selling_price / 100) * $count, 2, ',', '.') }}</td>
                </tr>
          </tbody>
        </table>
    @endcomponent
  </div>
</div>
@endsection
