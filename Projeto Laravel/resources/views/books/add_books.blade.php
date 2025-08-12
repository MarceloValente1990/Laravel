@extends('layouts.fe_master')

@section('content')

<div>
    <h1>Adicionar Livros</h1>
</div>

<form method="POST" action="{{ route('route_store_book') }}">
    @csrf

  <div class="mb-3">
    <label for="" class="form-label">Nome do Livro</label>
    <input required type="text" class="form-control" name="name">
   @error('name')
  Nome Inválido
  @enderror
</div>

<div class="mb-3">
    <label for="" class="form-label">Preço Estimado</label>
    <input required type="number" class="form-control" name="estimated_price">
   @error('estimated_price')
  Preço Estimado Inválido
  @enderror
</div>

<select name="user_id" id="">
            <option value=""></option>

            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
</select>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
