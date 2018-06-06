@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @component('layouts.card', ['title' => 'Locaties', 'create' => route('locations.create')])
        <table class="table table-borderless">
          <tbody>
            @foreach ($locations as $location)
                <tr>
                  <th scope="row">{{ $location->id }}</th>
                  <td>{{ strtoupper(substr($location->name, 0, 3)) }}</td>
                  <td>{{ $location->name }}</td>
                  <td class="text-right">
                    <a href="{{ route('locations.edit', ['id' => $location->id]) }}"class="text-primary mr-2">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="{{ route('locations.delete', ['id' => $location->id]) }}" class="text-danger">
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
