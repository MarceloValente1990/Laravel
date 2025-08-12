@extends('layouts.fe_master')

@section('content')

<h3>Editar Tarefa</h3>

<form method="POST" action="{{ route('route_tasks_update') }}">
    @csrf
    @method('PUT')

    <input type="hidden" name="id" value="{{ $myTask->id }}">

    <div class="mb-3">
        <label for="name" class="form-label">Nome da Tarefa</label>
        <input required name="name" type="text" class="form-control"
               value="{{ $myTask->name }}" id="name">
        @error('name')
            <div class="text-danger">Nome da Tarefa Inválido</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição da Tarefa</label>
        <input type="text" class="form-control" name="description"
               id="description" value="{{ $myTask->description }}">
    </div>

    <div class="mb-3">
        <label for="user_id" class="form-label">Responsável</label>
        <select name="user_id" id="user_id" class="form-select">
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    @if ($myTask->user_id == $user->id) selected @endif>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

@endsection
