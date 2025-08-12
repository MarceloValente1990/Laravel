@extends('layouts.fe_master')

@section('content')

<h3>Editar utilizador: {{$myUser->name}}</h3>

<form method="POST" action="{{ route('route_users_update') }}">
    @csrf

    @method('PUT')

<input type="hidden" name="id" value="{{$myUser->id}}">

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nome</label>
    <input required name="name" type="text" class="form-control" value="{{$myUser->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">
   @error('name')
  Nome Inválido
  @enderror
</div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Endereço de Email</label>
    <input disabled name="email" type="email" class="form-control" value="{{$myUser->email}}" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>

    <div class="mb-3">
        <label for="" class="form-label">Morada</label>
        <input type="text" class="form-control" name="address" value="{{$myUser->address}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">NIF</label>
        <input type="text"  @if ($myUser->nif != 'ainda não tem dados') readonly @endif
        class="form-control" name="nif" value="{{$myUser->nif}}">
    </div>

 <button type="submit" class="btn btn-primary">Atualizar</button>

@endsection
