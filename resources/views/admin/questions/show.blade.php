@extends("admin.layouts.app")

@section('content')
    <div class="container">

        <h4 class="mb-4">Банк вопросов</h4>

        {{-- ФИЛЬТРЫ --}}
        <div class="border rounded p-3 mb-4">

            <div class="mb-3">
                <label class="form-label">Выберите категорию</label>
                <select class="form-select" name="category">
                    <option>По умолчанию для Программирования </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Фильтр по тегам</label>
                <select class="form-select">
                    <option>Фильтр по тегам...</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Отображать текст вопроса</label>
                <select class="form-select">
                    <option>Нет</option>
                    <option>Да</option>
                </select>
            </div>

            <a href="#" class="small text-primary">Параметры поиска</a>
        </div>

        {{-- КНОПКА --}}
        <div class="mb-3">
            <a href="{{ route('admin.questions.create') }}" class="btn btn-primary">
                Создать новый вопрос
            </a>
        </div>

        {{-- ТАБЛИЦА --}}
        <div class="border rounded">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                <tr>
                    <th width="30"></th>
                    <th>Тип</th>
                    <th>Вопрос</th>
                    <th>Действия</th>
                    <th>Статус</th>
                    <th>Версия</th>
                    <th>Создан</th>
                    <th>Комментарии</th>
                    <th>Требуется проверка</th>
                </tr>
                </thead>

                <tbody>

@endsection
