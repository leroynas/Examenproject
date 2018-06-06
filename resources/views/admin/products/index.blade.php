@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @component('layouts.card', ['title' => 'Producten', 'create' => route('products.create')])
        <table class="table table-borderless m-0">
          <tbody>
            @foreach ($products as $product)
                <tr>
                  <th scope="row">{{ $product->id }}</th>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->type }}</td>
                  <td>{{ $product->manufacterer->name }}</td>
                  <td>&euro; {{ number_format($product->purchase_price / 100, 2, ',', '.') }}</td>
                  <td>&euro; {{ number_format($product->selling_price / 100, 2, ',', '.') }}</td>
                  <td class="text-right">
                    <a href="{{ route('products.edit', ['product' => $product->id]) }}"class="text-primary mr-2">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="{{ route('products.delete', ['product' => $product->id]) }}" class="text-danger">
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
