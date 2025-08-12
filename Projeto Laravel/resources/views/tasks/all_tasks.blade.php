@extends('layouts.fe_master')

@section('content')

<div>
    <h2>Tarefas</h2>
    <h3>To do list:</h3>

       <ul>
        @foreach ($tasks as $task)
        <li>{{$task['name']}} || {{$task['task']}}</li>
        @endforeach
    </ul>
</div>

<hr>
    <h4>Tarefas da Base de Dados</h4>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome da Tarefa</th>
      <th scope="col">Nome do Responsável</th>
      <th scope="col">Descrição</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($tasksFromDB as $task)
    <tr>
      <th scope="row">{{$task->id}}</th>
      <td>{{$task->name}}</td>
      <td>{{$task->username}}</td>
      <td>{{$task->description}}</td>
      <td>
        <a href="{{ route('tasks_show', $task->id) }}"class="btn btn-info me-2">Ver/Editar</a>
        <a href="{{ route('tasks_delete', $task->id) }}" class="btn btn-danger">Apagar</a>
    </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection
