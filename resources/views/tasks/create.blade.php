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
                        <input type="text" name="title" id="title"
                            class="form-control  @error('title') is-invalid @enderror">
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
                            <option value="" selected disabled>Select one</option>
                            @foreach ($usuarios as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                            rows="3"></textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>


            </div>
        </div>
    </div>
@endsection
