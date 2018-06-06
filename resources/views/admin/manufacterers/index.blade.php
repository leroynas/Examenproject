@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @component('layouts.card', ['title' => 'Fabrikanten', 'create' => route('manufacterers.create')])
        <table class="table table-borderless m-0">
          <tbody>
            @foreach ($manufacterers as $manufacterer)
                <tr>
                  <th scope="row">{{ $manufacterer->id }}</th>
                  <td>{{ $manufacterer->name }}</td>
                  <td class="text-right">
                    <a href="{{ route('manufacterers.edit', ['id' => $manufacterer->id]) }}"class="text-primary mr-2">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="{{ route('manufacterers.delete', ['id' => $manufacterer->id]) }}" class="text-danger">
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
