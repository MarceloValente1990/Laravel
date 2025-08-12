<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
 public function addTask() {
    $users = User::get();
        return view('tasks.add_tasks', compact('users'));
    }

    public function allTasks(){


        $tasks = $this->getTasks();


        $tasksFromDB = $this->getTasksFromDB();

        return view('tasks.all_tasks', compact('tasks','tasksFromDB'));
   }


    public function viewTask($id){
        $myTask = Task::join('users', 'tasks.user_id', "=", "users.id")
        ->select('tasks.*', 'users.name as username' )
        ->where('tasks.id', $id)->first();

        $users = User::get();

        return view('tasks.show_task', compact('myTask', 'users'));
    }

    public function deleteTask($id){
        Task::where('id', $id)->delete();
        return back();
    }

    public function storeTask(Request $request){
        // dd($request->all());

        $request->validate([
            'name'=>'string|max:50|required',
            'description'=>'string|required',
            'user_id'=>'required'
        ]);

        Task::insert([
            'name'=> $request->name,
            'description'=>$request->description,
            'user_id'=>($request->user_id),
        ]);

        return redirect()->route('tasks_list')->with('message', 'Tarefa adicionada com Sucesso!');
    }

    public function updateTask(Request $request){
        $request->validate([
            'name'=>'required',
            'user_id'=>'required',
        ]);

        Task::where('id', $request->id)
        ->update([
            'name'=> $request->name,
            'user_id'=> $request->user_id,
            'description'=> $request->description,
            'updated_at'=>now()
        ]);

        return redirect()->route('tasks_list')->with('message', 'Tarefa atualizada com sucesso!');

    }

    private function getTasks(){

        $tasks = [
            ['name' => 'Rita', 'task' => 'Estudar Laravel'],
            ['name' => 'Igor', 'task' => 'Estudar SQL']
        ];
        return $tasks;
    }

        private function getTasksFromDB(){

        $tasks = Task::join('users', 'users.id', "=", "tasks.user_id")
        ->select('tasks.*', 'users.name as username' )
        ->get();

       
        return $tasks;
    }
}
