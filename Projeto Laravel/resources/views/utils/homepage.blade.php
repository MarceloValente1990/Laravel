@extends('layouts.fe_master')

@section('content')

<div style="padding-bottom: 80px;">
<h3>Bem-vindo {{isset($myName) ? $myName : 'utilizador'}}</h3>
    <img src="{{ asset('images/alpes.jpeg') }}" alt="">

<br></br>

    <h6>DADOS DA CESAE</h6>
<ul>
    <li>{{$cesaeInfo['name']}}</li>
    <li>{{$cesaeInfo['address']}}</li>
    <li>{{$cesaeInfo['email']}}</li>
</ul>
    <ul>
        <li><a href="{{ route('hello_name') }}">Hello</a></li>
        <li><a href="{{ route('users_name') }}">Adicionar utilizador</a></li>
        <li><a href="{{ route('users_list') }}">Lista de utilizadores</a></li>
        <li><a href="{{ route('tasks_name') }}">Adicionar Tarefa</a></li>
        <li><a href="{{ route('tasks_list') }}">Lista de tarefas</a></li>
        <li><a href="{{ route('route_add_book') }}">Adicionar Livros</a></li>
        <li><a href="{{ route('route_all_books') }}">Lista de Livros</a></li>

    </ul>
    <br>
    <br>
</div>

@endsection
