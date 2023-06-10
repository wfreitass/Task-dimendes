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
                    @can('is_logged')
                        <div class="col-6 text-end">
                            <a name="cadastro" id="cadastr" class="btn btn-success" href="{{ route('task-create') }}"
                                role="button">Cadastrar Tarefa</a>
                        </div>
                    @endcan
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <form method="POST" action="{{ route('search') }}">
                            @csrf
                            <div class="form-group d-flex">

                                <input type="text" class="form-control w-50" id="fielter" name="search"
                                    placeholder="Procurar ....">
                                <button type="submit" class="btn btn-primary">Procurar</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <form method="POST" action="{{ route('tasks') }}" id="form-order">
                            @csrf
                            <select class="form-control" id="order" name="order">
                                <option selected disabled>Ordenar</option>
                                <option value="1">Título</option>
                                <option value="2">Data de Criação</option>
                            </select>
                        </form>
                    </div>
                </div>
                @if ($tasks->count() > 0)
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-hover table-borderless table-primary align-middle">
                            <thead class="table-light">
                                <caption></caption>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Criador</th>
                                    <th>Responsável</th>
                                    <th>Data Criação</th>
                                    <th>Data Alteração</th>
                                    @can('is_logged')
                                        <th>Ações</th>
                                    @endcan
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
                                        @can('is_logged')
                                            <td>
                                                <div class="d-flex justify-content-evenly">
                                                    <a href="{{ route('task-edit', ['task' => $task]) }}" type="button"
                                                        class="btn btn-warning mr-1">Editar</a>
                                                    <form action="{{ route('task-delete', ['id' => $task->id]) }}"
                                                        method="post" class="form-delete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-delete">Excluir</button>
                                                    </form>
                                                </div>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    {{ $tasks->links() }}
                @else
                    <div class="alert alert-warning" role="alert">
                        <strong>Nenhuma tarefa encontrada</strong>
                        <p>Cadastre tarefas para poder gerenciar.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.getElementById('order').addEventListener('change', function() {
            document.getElementById('form-order').submit();
        });
    </script>

@endsection
