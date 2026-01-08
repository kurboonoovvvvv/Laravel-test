@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Добавить вопрос</h2>

        <form action="{{ route('admin.answers.store') }}" method="POST">
            @csrf

            {{-- Тест --}}
            <div class="mb-3">
                <label>Тест</label>
                <select name="test_id" class="form-control" required>
                    @foreach($tests as $test)
                        <option value="{{ $test->id }}">{{ $test->title }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Вопрос --}}
            <div class="mb-3">
                <label>Вопрос</label>
                <textarea name="question" class="form-control" required></textarea>
            </div>

            {{-- Тип --}}
            <div class="mb-3">
                <label>Тип вопроса</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="">-- выбрать --</option>
                    <option value="single">1 из 4 (один правильный)</option>
                    <option value="multiple">1 из 4 (несколько)</option>
                    <option value="boolean">Да / Нет</option>
                    <option value="short">Короткий ответ</option>
                </select>
            </div>

            {{-- single / multiple --}}
            <div id="choices" style="display:none">
                <label>Варианты ответов</label>

                @for ($i = 0; $i < 4; $i++)
                    <div class="d-flex mb-2">
                        <input
                            type="text"
                            name="answers[{{ $i }}][answer]"
                            class="form-control me-2"
                            placeholder="Ответ {{ $i + 1 }}"
                        >
                        <input
                            type="checkbox"
                            name="answers[{{ $i }}][is_correct]"
                            value="1"
                        >
                        <span class="ms-1">верный</span>
                    </div>
                @endfor
            </div>

            {{-- boolean --}}
            <div id="boolean" style="display:none">
                <label>Правильный ответ</label>
                <select name="correct" class="form-control">
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </div>

            {{-- short --}}
            <div id="short" style="display:none">
                <label>Правильный ответ</label>
                <input type="text" name="correct_answer" class="form-control">
            </div>

            <button class="btn btn-primary mt-3">Сохранить</button>
        </form>
    </div>

    <script>
        document.getElementById('type').addEventListener('change', function () {
            document.getElementById('choices').style.display =
                ['single', 'multiple'].includes(this.value) ? 'block' : 'none';

            document.getElementById('boolean').style.display =
                this.value === 'boolean' ? 'block' : 'none';

            document.getElementById('short').style.display =
                this.value === 'short' ? 'block' : 'none';
        });
    </script>
@endsection
