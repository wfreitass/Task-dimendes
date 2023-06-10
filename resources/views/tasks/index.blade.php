@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-6">
                        <h1>Tarefas</h1>
                    </div>
                    <div class="col-6 text-end"> <a name="cadastro" id="cadastr" class="btn btn-success"
                            href="{{ route('task-create') }}" role="button">Cadastrar Tarefa</a></div>
                </div>

                @if ($tasks->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-borderless table-primary align-middle">
                            <thead class="table-light">
                                <caption>Table Name</caption>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Criador</th>
                                    <th>Responsável</th>
                                    <th>Data Criação</th>
                                    <th>Data Alteração</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($tasks as $key => $task)
                                    <tr class="table-primary">
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->userCreate->name }}</td>
                                        <td>{{ $task->userResponse->name }}</td>
                                        <td>{{ strftime('%d/%m/%Y', strtotime($task->created_at)) }}</td>
                                        <td>{{ strftime('%d/%m/%Y', strtotime($task->updated_at)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        <strong>Nenhuma tarefa encontrada</strong>
                        <p>Cadastre tarefas para poder gerenciar.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
