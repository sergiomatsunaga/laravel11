@extends('admin.layouts.app')


@section('title', 'List User')

@section('content')

    <h1> usuários</h1>
   
    <a href="{{ route('users.create')}}">
        Adicionar Usuário
    </a>
    <x-alert></x-alert>
    <table>
        <thead>
            <tr>
                <th>
                    nome
                </th>
                <th>email</th>
                <th>teste</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('users.edit',$user->id) }}">Edit</a></td>
                    <td><a href="{{ route('users.show',$user->id) }}">Details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}

@endsection