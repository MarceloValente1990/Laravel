@extends('layouts.fe_master')

@section('content')

<div>
    <h3>Adicionar utilizadores</h3>
</div>

<form method="POST" action="{{ route('users_store') }}">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nome</label>
    <input required name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   @error('name')
  Nome Inválido
  @enderror
</div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Endereço de Email</label>
    <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   @error('email')
  Email Inválido
  @enderror
</div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
