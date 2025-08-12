<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\BookController;


Route::get('/', function () { return view('welcome');});

Route::get('/home', [UtilController::class, 'homepage'])->name('home_name');

Route::get('hello', [UtilController::class, 'hellopage'])->name('hello_name');

Route::get('/add_users',[UserController::class, 'addUser'])->name('users_name');


Route::post('/store_user', [UserController::class, 'storeUser'])->name('users_store');

Route::get('/modules/{name}', function ($name) { return '<h2>Este é o módulo de: '.$name.'</h2>';});


Route::fallback(function(){ return view('utils.fallback');});

// Rota que mostra tabela com todos os users
Route::get('/all_users',[UserController::class, 'allUsers'])->name('users_list');

// Rota adicionada para nova view onde mostra os detalhes de cada user
Route::get('view_user/{id}', [UserController::class, 'viewUser'])->name('users_show');

// Rota adicionada que permite apagar um user
Route::get('delete_user/{id}', [UserController::class, 'deleteUser'])->name('users_delete');

Route::get('/test-queries',[UserController::class, 'testSqlQueries']);

// Rota que pega nos dados do formulários para fazer um update
Route::put('/update_user', [UserController::Class, 'updateUser'])->name('route_users_update');

// Rota que mostra tabela com todas as tarefas
Route::get('/all_tasks',[TaskController::class, 'allTasks'])->name('tasks_list');

// Rota adicionada para nova view onde mostra os detalhes de cada task
Route::get('view_task/{id}', [TaskController::class, 'viewTask'])->name('tasks_show');

// Rota adicionada que permite apagar uma task
Route::get('delete_task/{id}', [TaskController::class, 'deleteTask'])->name('tasks_delete');

// Rota que apresenta o formulário para preencher uma nova tarefa
Route::get('/add_tasks',[TaskController::class, 'addTask'])->name('tasks_name');

// rota que pega nos dados do formulário e envia para o servidor
Route::post('/store_task', [TaskController::class, 'storeTask'])->name('tasks_store');

// Rota que pega nos dados do formulários para fazer um update
Route::put('/update_task', [TaskController::Class, 'updateTask'])->name('route_tasks_update');

// Rota que mostra tabela com todos os livros
Route::get('/all_books', [BookController::class, 'functionAllBooks'])->name('route_all_books');

// Rota adicionada para nova view onde mostra os detalhes de cada livro
Route::get('view_book/{id}', [BookController::class, 'functionViewBook'])->name('route_view_book');

// Rota adicionada que permite apagar um livro
Route::get('delete_book/{id}', [BookController::class, 'functionDeleteBook'])->name('route_delete_book');

// Rota que apresenta o formulário para preencher um novo livro
Route::get('/add_books', [BookController::class, 'functionAddBook'])->name('route_add_book');

// rota que pega nos dados do formulário e envia para o servidor
Route::post('/store_book', [BookController::class, 'functionStoreBook'])->name('route_store_book');

// Rota que pega nos dados do formulários para fazer um update
Route::put('/update_book', [BookController::Class, 'functionUpdateBook'])->name('route_books_update');

