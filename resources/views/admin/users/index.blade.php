@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @component('layouts.card', ['title' => 'Gebruikers', 'create' => route('users.register')])
        <table class="table table-borderless m-0">
          <tbody>
            @foreach ($users as $user)
                <tr>
                  <th>{{ $user->id }}</th>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->prefix }}</td>
                  <td>{{ $user->initials }}</td>
                  <td>{{ $user->last_name }}</td>
                  <td class="text-right">
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}"class="text-primary mr-2">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="{{ route('users.delete', ['user' => $user->id]) }}" class="text-danger">
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
