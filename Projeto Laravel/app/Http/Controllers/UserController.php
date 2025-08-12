<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function addUser() {
        return view('users.add_users');
    }

    public function allUsers(){


        $users = $this->getUsers();


        $usersFromDB = $this->getUsersFromDB();

        $courseResp = User::where('id', 5)
                        ->select('name', 'email')
                        ->first();


        return view('users.all_users', compact('users','usersFromDB', 'courseResp'));
    }

    public function testSqlQueries(){

        DB::table('users')
        ->where('id', 3)
        ->delete();


        return response()->json('query ok');
    }


    public function viewUser($id){
        $myUser = User::where('id', $id)->first();
        return view('users.show_user', compact('myUser'));
    }

    public function deleteUser($id){

        Task::where('user_id', $id)->delete();


        User::where('id', $id)->delete();

        return back();
    }

    public function storeUser(Request $request){

        $request->validate([
            'name'=>'string|max:50|required',
            'email'=>'required|email|unique:users'
        ]);

        User::insert([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('users_list')->with('message', 'Utilizador adicionado com Sucesso!'); // o with permite enviar uma mensagem para a sessão do utilizador - variável de sessão (message) fica armazenada no browser (entre a vista cliente e o servidor) - esta variável armazena uma string que diz 'Utilizador adicionado com sucesso'

    }

    public function updateUser(Request $request){
        // dd($request->all());

        $request->validate([
            'name' =>'required'
        ]);

        User::where('id', $request->id)
        ->update([
            'name'=> $request->name,
            'nif'=> $request->nif,
            'address'=> $request->address,
        ]);

        return redirect()->route('users_list')->with('message', 'Utilizador atualizado com sucesso!');
    }

    private function getUsers(){
        // simula a ida à base de dados carregar todos os users
        $users = [
            ['id' => 1, 'name' => 'Rita', 'phone' => '912222222'],
            ['id' => 2, 'name' => 'Maria', 'phone' => '919333333'],
            ['id' => 3, 'name' => 'Joana', 'phone' => '914444444'],
            ['id' => 4, 'name' => 'Teresa', 'phone' => '919999999'],
        ];
        return $users;
    }

    private function getUsersFromDB(){

        $users = DB::table('users')

        ->get();
        return $users;
    }
}
