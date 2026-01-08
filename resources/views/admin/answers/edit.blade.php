@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Редактировать вопрос</h2>

        <form action="{{ route('admin.answers.update', $question->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Тест --}}
            <div class="mb-3">
                <label>Тест</label>
                <select name="test_id" class="form-control" required>
                    @foreach($tests as $test)
                        <option value="{{ $test->id }}" {{ $question->test_id == $test->id ? 'selected' : '' }}>
                            {{ $test->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Вопрос --}}
            <div class="mb-3">
                <label>Вопрос</label>
                <textarea name="question" class="form-control" required>{{ $question->question }}</textarea>
            </div>

            {{-- Тип --}}
            <div class="mb-3">
                <label>Тип вопроса</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="">-- выбрать --</option>
                    <option value="single" {{ $question->type === 'single' ? 'selected' : '' }}>1 из 4 (один правильный)</option>
                    <option value="multiple" {{ $question->type === 'multiple' ? 'selected' : '' }}>1 из 4 (несколько)</option>
                    <option value="boolean" {{ $question->type === 'boolean' ? 'selected' : '' }}>Да / Нет</option>
                    <option value="short" {{ $question->type === 'short' ? 'selected' : '' }}>Короткий ответ</option>
                </select>
            </div>

            {{-- Ответы --}}
            <div id="answers-block" style="display:none">
                @if(in_array($question->type, ['single', 'multiple']))
                    <label>Варианты ответов</label>
                    @php
                        $answers = $question->answers; // все ответы для вопроса
                    @endphp
                    @for ($i = 0; $i < 4; $i++)
                        <div class="d-flex mb-2">
                            <input type="text" name="answers[{{ $i }}][answer]" class="form-control me-2"
                                   placeholder="Ответ {{ $i + 1 }}" value="{{ $answers[$i]->answer ?? '' }}">
                            <input type="checkbox" name="answers[{{ $i }}][is_correct]" value="1"
                                {{ isset($answers[$i]) && $answers[$i]->is_correct ? 'checked' : '' }}>
                            <span class="ms-1">верный</span>
                        </div>
                    @endfor
                @elseif($question->type === 'boolean')
                    @php $answer = $question->answers->first(); @endphp
                    <label>Правильный ответ</label>
                    <select name="correct" class="form-control">
                        <option value="1" {{ $answer && $answer->is_correct ? 'selected' : '' }}>Да</option>
                        <option value="0" {{ $answer && !$answer->is_correct ? 'selected' : '' }}>Нет</option>
                    </select>
                @elseif($question->type === 'short')
                    @php $answer = $question->answers->first(); @endphp
                    <label>Правильный ответ</label>
                    <input type="text" name="correct_answer" class="form-control"
                           value="{{ $answer->answer ?? '' }}">
                @endif
            </div>

            <button class="btn btn-primary mt-3">Сохранить</button>
        </form>
    </div>

    <script>
        const typeSelect = document.getElementById('type');
        const answersBlock = document.getElementById('answers-block');

        function toggleAnswers() {
            if(['single', 'multiple', 'boolean', 'short'].includes(typeSelect.value)){
                answersBlock.style.display = 'block';
            } else {
                answersBlock.style.display = 'none';
            }
        }

        typeSelect.addEventListener('change', toggleAnswers);
        window.addEventListener('DOMContentLoaded', toggleAnswers);
    </script>
@endsection
