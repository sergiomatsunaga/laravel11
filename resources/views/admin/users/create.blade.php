@extends('admin.layouts.app')

@section('title', 'Add User')
@section('content')
<h1>
    Novo Usuário
</h1>


<x-alert></x-alert>


<form action="{{route('users.store')}}" method="post">
@csrf()

<input type="hidden" name="_token" value="{{ csrf_token()}}">
   
    <input type="text" name="name" placeholder="Name" value=" {{ old('name')}} ">
    <input type="text" name="email" placeholder="E-mail"  value=" {{ old('email')}} ">
    <input type="text" name="password" placeholder="Password">
    <button type="submit">Submit</button>

</form>


@endsection