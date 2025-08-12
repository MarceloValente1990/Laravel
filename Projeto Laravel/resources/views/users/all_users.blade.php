@extends('layouts.fe_master')

@section('content')


@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>

@endif
    <h1>Lista de Users</h1>

    <ul>
        @foreach ($users as $user)
        <li>{{$user['name']}} || {{$user['phone']}}</li>
        @endforeach
    </ul>

    <br>
    <h6>Responsável</h6>
    <ul>
        <li>Nome: {{ $courseResp ? $courseResp->name : 'ainda não atribuído' }}</li>
        <li>Email: {{ $courseResp ? $courseResp->email : 'geral@cesae.pt' }}</li>
    </ul>


    <hr>
    <h4>Users da Base de Dados</h4>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">NIF</th>
      <th scope="col">Endereço</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($usersFromDB as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->nif}}</td>
      <td>{{$user->address}}</td>
      <td>
        <a href="{{ route('users_show', $user->id) }}"class="btn btn-info me-2">Ver/Editar</a>
        <a href="{{ route('users_delete', $user->id) }}" class="btn btn-danger">Apagar</a>
    </td>
</tr>
    @endforeach

  </tbody>
</table>
@endsection
