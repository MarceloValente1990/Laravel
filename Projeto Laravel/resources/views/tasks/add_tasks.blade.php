@extends('layouts.fe_master') <!--Isto extende ao doc fe_master.blade.php -->

@section('content') <!--Selecionamos todo o conteúdo que irá aparecer na página, dentro do section (section & endsection) -->

<div>
    <h1>Adiciona mais tarefas</h1>
</div>

<form method="POST" action="{{ route('tasks_store') }}">
    @csrf

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nome da Tarefa</label>
    <input required name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

   @error('name')
  Nome Inválido
  @enderror

</div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Endereço de Email</label>
    <input name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    @error('description')
  Descrição Inválido
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
