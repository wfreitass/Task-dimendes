<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\User;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->taskService->getAll();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::orderBy('name', 'ASC')->get();
        return view('tasks.create', ['usuarios' => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        if ($request->isMethod('post')) {
            $dados = $request->all();
            $dados['id_user_create'] = Auth::user()->id;
            $task = $this->taskService->create($dados);
            if ($task) {
                return redirect('tasks')->with('success', 'Tarefa Adicionada com sucesso');
            } else {
                return redirect('tasks')->with('success', 'Erro ao tentar inserir uma nova tarefa ');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $usuarios = User::orderBy('name', 'ASC')->get();
        return view('tasks.update', ['task' => $task, 'usuarios' => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, int $id)
    {
        if ($request->isMethod('put')) {
            $result = $this->taskService->update($id, $request->all());
            if ($result) {
                return redirect('tasks')->with('success', 'Tarefa Editada com sucesso');
            } else {
                return redirect('tasks')->with('success', 'Erro ao tentar editar uma tarefa');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $result = $this->taskService->delete($id);
        if ($result) {
            return redirect('tasks')->with('success', 'Tarefa Editada com sucesso');
        } else {
            return redirect('tasks')->with('success', 'Erro ao tentar editar uma tarefa');
        }
    }


    public function search(Request $request)
    {
        if ($request->get('search')) {

            $tasks = $this->taskService->search($request->get('search'));
        } else {
            $tasks = $this->taskService->getAll();
        }
        return view('tasks.index', ['tasks' => $tasks]);
    }
}
