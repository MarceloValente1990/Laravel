@extends('layouts.fe_master')

@section('content')

<h3>Editar Livro</h3>

<form method="POST" action="{{ route('route_books_update') }}">
    @csrf
    @method('PUT')

    <input type="hidden" name="id" value="{{ $myBook->id }}">

    <div class="mb-3">
        <label for="name" class="form-label">Livro</label>
        <input required name="name" type="text" class="form-control"
               value="{{ $myBook->name }}" id="name">
    </div>

     <div class="mb-3">
        <label for="user_id" class="form-label">Responsável</label>
        <select name="user_id" id="user_id" class="form-select">
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    @if ($myBook->user_id == $user->id) selected @endif>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="estimated_price" class="form-label">Preço Estimado</label>
        <input required name="estimated_price" readonly type="number"
               class="form-control" value="{{ $myBook->estimated_price }}"
               id="estimated_price">
        @error('estimated_price')
            <div class="text-danger">Preço Estimado Inválido</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="paid_price" class="form-label">Preço Pago</label>
        <input name="paid_price" type="number" class="form-control"
               value="{{ $myBook->paid_price }}" id="paid_price">
        @error('paid_price')
            <div class="text-danger">Preço Pago Inválido</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

@endsection
