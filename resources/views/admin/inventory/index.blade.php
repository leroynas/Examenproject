@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @include('layouts.locations')

    @component('layouts.card', ['title' => 'Voorraad '.$location->name, 'create' => route('inventory.create' , ['location' => $location->id])])
        <table class="table table-borderless m-0">
          <thead>
              <tr>
                  <th>Product</th>
                  <th>Type</th>
                  <th>Fabrikant</th>
                  <th>Aantal</th>
                  <th>Inkoopprijs</th>
                  <th>Verkoopprijs</th>
                  <th>Inkoopwaarde</th>
                  <th>Verkoopwaarde</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($location->products as $product)
                <tr>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->type }}</td>
                  <td>{{ $product->manufacterer->name }}</td>
                  <td>{{ $count = $product->pivot->count }}</td>
                  <td>&euro; {{ number_format($product->purchase_price / 100, 2, ',', '.') }}</td>
                  <td>&euro; {{ number_format($product->selling_price / 100, 2, ',', '.') }}</td>
                  <td>&euro; {{ number_format(($product->purchase_price / 100) * $count, 2, ',', '.') }}</td>
                  <td>&euro; {{ number_format(($product->selling_price / 100) * $count, 2, ',', '.') }}</td>
                  <td class="text-right">
                    <a href="{{ route('inventory.edit', ['location' => $location->id, 'product' => $product->id]) }}"class="text-primary mr-2">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="{{ route('inventory.delete', ['location' => $location->id, 'product' => $product->id]) }}" class="text-danger">
                        <i class="far fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    @endcomponent
</div>
@endsection
