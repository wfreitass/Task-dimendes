@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Tarefa</div>

                    <div class="card-body">
                        <form action="{{ route('task-update', ['id' => $task->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Tarefa</label>
                                <input type="text" name="title" id="title"
                                    class="form-control  @error('title') is-invalid @enderror" value="{{ $task->title }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="id_user_response" class="form-label">Responsável</label>
                                <select class="form-select form-select-lg @error('id_user_response') is-invalid @enderror"
                                    name="id_user_response" id="id_user_response">
                                    @foreach ($usuarios as $user)
                                        <option @if ($task->userResponse->id == $user->id) selected @endif
                                            value="{{ $user->id }}">
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('id_user_response')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                    rows="3">{{ $task->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
