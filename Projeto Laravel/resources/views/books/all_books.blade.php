@extends('layouts.fe_master')

@section('content')

<div>
    <h2>Lista de Livros</h2>
    <br>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título do Livro</th>
                <th scope="col">Nome do Utilizador</th>
                <th scope="col">Preço Estimado</th>
                <th scope="col">Preço Pago</th>
                <th scope="col">Diferença Preço</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->username }}</td>
                    <td>{{ $book->estimated_price }}€</td>
                    <td>{{ $book->paid_price }}€</td>
                    <td>
                        {{ $book->diferenca_preco ? $book->diferenca_preco : '-' }}
                    </td>
                    <td>
                        <a href="{{ route('route_view_book', $book->id) }}" class="btn btn-info me-2">Ver/Editar</a>
                        <a href="{{ route('route_delete_book', $book->id) }}" class="btn btn-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
