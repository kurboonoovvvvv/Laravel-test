@extends('admin.layouts.app')

@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
            Добавить вопрос
        </button>

        @php
            $questions = $questions ?? collect();
        @endphp

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Вопрос</th>
                <th>Описание</th>
                <th>Баллы</th>
            </tr>
            </thead>
            <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->title }}</td>
                    <td>{{ $question->description ?? '' }}</td>
                    <td>{{ $question->score ?? 0 }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Модальное окно -->
        <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Новый вопрос</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Заголовок -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Название вопроса</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>

                            <!-- Описание -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Описание</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>

                            <!-- Баллы -->
                            <div class="mb-3">
                                <label for="score" class="form-label">Баллы</label>
                                <input type="number" class="form-control" id="score" name="score" value="1" min="0" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
