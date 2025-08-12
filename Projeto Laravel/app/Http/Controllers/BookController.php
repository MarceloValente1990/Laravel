<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function functionAllBooks(){
        $books = $this->getBooks();
        return view('books.all_books', compact('books'));
    }

    public function functionViewBook($id){
        $myBook = Book::join('users', 'books.user_id', "=", "users.id")
            ->select('books.*', 'users.name as username')
            ->where('books.id', $id)
            ->first();

        if ($myBook) {
            $myBook->diferenca_preco = $this->calcularDiferencaPreco($myBook);
        }

        $users = User::get();
        return view('books.show_book', compact('myBook', 'users'));
    }

    public function functionDeleteBook($id){
        Book::where('id', $id)->delete();
        return back();
    }

    public function functionAddBook(){
        $users = User::get();
        $books = Book::get();
        return view('books.add_books', compact('books', 'users'));
    }

    public function functionStoreBook(Request $request){
        $request->validate([
            'name' => 'string|max:50|required',
            'estimated_price' => 'required',
            'user_id' => 'required'
        ]);

        Book::insert([
            'name' => $request->name,
            'estimated_price' => $request->estimated_price,
            'user_id' => $request->user_id,
            'created_at' => now(),
        ]);

        return redirect()->route('route_all_books')->with('message', 'Livro adicionado com sucesso!');
    }

    public function functionUpdateBook(Request $request){
        $request->validate([
            'name' => 'required',
            'estimated_price' => 'required',
            'user_id' => 'required',
        ]);

        Book::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'estimated_price' => $request->estimated_price,
                'paid_price' => $request->paid_price,
                'user_id' => $request->user_id,
                'updated_at' => now()
            ]);

        return redirect()->route('route_all_books')->with('message', 'Livro atualizado com sucesso!');
    }

    private function getBooks(){
        $books = Book::join('users', 'users.id', "=", "books.user_id")
            ->select('books.*', 'users.name as username')
            ->get();

        foreach ($books as $book) {
            $book->diferenca_preco = $this->calcularDiferencaPreco($book);
        }

        return $books;
    }

    private function calcularDiferencaPreco($book)
{
    $diferenca = $book->paid_price - $book->estimated_price;

    if ($diferenca < 0) {
        return abs($diferenca) . '€ mais barato';
    } elseif ($diferenca > 0) {
        return $diferenca . '€ mais caro';
    }
}
}
