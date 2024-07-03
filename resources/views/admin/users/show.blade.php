@extends('admin.layouts.app')

@section('title', 'Details User')
@section('content')
<h1>
    Exibir Usuário {{ $user->name }}
</h1>

<x-alert></x-alert>

<li>nome: {{ $user->name }} </li> 
<li>email: {{ $user->email }} </li> 


<form action="{{ route('users.destroy',$user->id) }}" method="post">
    @csrf()
    @method('delete')
    <input type="hidden" name="_method" value="delete">
    <input type="hidden" name="_token" value="{{ csrf_token()}}">
   

    <button type="submit">delete</button>

</form>


@endsection