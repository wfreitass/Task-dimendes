@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Cadastro de Tarefas</h1>
                <form action="{{ route('task-store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Tarefa</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="id_user_response" class="form-label">Responsável</label>
                        <select class="form-select form-select-lg" name="id_user_response" id="id_user_response">
                            <option selected disabled>Select one</option>
                            @foreach ($usuarios as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>


            </div>
        </div>
    </div>
@endsection
