@extends('admin.layouts.app')

@section('title', 'Edit User')
@section('content')
<h1>
    Editar Usuário {{ $user->name }}
</h1>

<x-alert></x-alert>



<form action="{{ route('users.update',$user->id) }}" method="post">
    @csrf()
    @method('put')
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="_token" value="{{ csrf_token()}}">
   
    <input type="text" name="name" placeholder="Name" value=" {{ $user->name }} ">
    <input type="text" name="email" placeholder="E-mail"  value=" {{ $user->email }} ">
    <input type="text" name="password" placeholder="Password">
    <button type="submit">Submit</button>

</form>


@endsection