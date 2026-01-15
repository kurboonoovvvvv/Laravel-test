@extends("admin.layouts.app")

@section('title')
@endsection
@section('header')
    Создание теста
@endsection
@section("content")
    <label>Название</label>

    <input type="text" class="form-control">
    <br>
    <div class="quill-custom">
        <div class="js-quill"
             style="height: 8rem;"
             data-hs-quill-options='{
           "placeholder": "Type your description...",
           "modules": {
             "toolbar": [
               ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
             ]
           }
         }'>
        </div>
    </div>

    <input type="hidden" name="description" id="description">
        <br>
    <input type="checkbox" > Отображение описание/вступление на страницу курса
    {{-- СРОКИ --}}
    <div class="border rounded p-3 mb-4">
        <h5 class="mb-3">Сроки</h5>

        {{-- Начало --}}
        <div class="row align-items-center mb-3">
            <div class="col-md-3">Начало тестирования</div>
            <div class="col-md-7">
                <input type="datetime-local" name="start_at" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="checkbox" name="start_enabled"> Включить
            </div>
        </div>

        {{-- Окончание --}}
        <div class="row align-items-center mb-3">
            <div class="col-md-3">Окончание тестирования</div>
            <div class="col-md-7">
                <input type="datetime-local" name="end_at" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="checkbox" name="end_enabled"> Включить
            </div>
            <br>
        </div>

        {{-- Ограничение времени --}}
        <div class="row align-items-center mb-3">
            <div class="col-md-3">Ограничение времени</div>
            <div class="col-md-7">
                <input type="number" name="time_limit" class="form-control" placeholder="минуты">
            </div>
            <div class="col-md-2">
                <input type="checkbox" name="time_enabled"> Включить
            </div>
        </div>

        {{-- При истечении --}}
        <div class="row">
            <div class="col-md-3">При истечении времени</div>
            <div class="col-md-7">
                <select name="time_expired_action" class="form-select">
                    <option>Открытые попытки отправляются автоматически</option>
                    <option>Попытка аннулируется</option>
                </select>
            </div>
        </div>
    </div>
    <hr>
    {{-- ОЦЕНКА --}}
    <div class="border rounded p-3 mb-4">
        <h5 class="mb-3">Оценка</h5>

        <div class="mb-3">
            <label class="form-label">Категория оценки</label>
            <select name="grade_category" class="form-select">
                <option>Без категории</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Проходной балл</label>
            <input type="number" name="pass_score" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Количество попыток</label>
            <select name="attempts" class="form-select">
                <option>Не ограничено</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Метод оценивания</label>
            <select name="grade_method" class="form-select">
                <option>Лучшая оценка</option>
                <option>Средняя оценка</option>
                <option>Первая попытка</option>
                <option>Последняя попытка</option>
            </select>
        </div>
    </div>
    {{-- СВОЙСТВА ВОПРОСА --}}
    <div class="border rounded mb-4">

        {{-- Заголовок --}}
        <div class="d-flex justify-content-between align-items-center px-3 py-2 section-toggle"
             onclick="toggleSection(this)">
            <h5 class="mb-0">Свойства вопроса</h5>
            <span class="arrow">▸</span>
        </div>

        {{-- Тело --}}
        <div class="section-body px-3">

            {{-- Случайный порядок ответов --}}
            <div class="row align-items-center mb-3">
                <div class="col-md-4">
                    Случайный порядок ответов
                </div>
                <div class="col-md-6">
                    <select name="shuffle_answers" class="form-select">
                        <option value="1" {{ old('shuffle_answers') == 1 ? 'selected' : '' }}>Да</option>
                        <option value="0" {{ old('shuffle_answers') == 0 ? 'selected' : '' }}>Нет</option>
                    </select>
                </div>
            </div>

            {{-- Режим поведения вопросов --}}
            <div class="row align-items-center mb-3">
                <div class="col-md-4">
                    Режим поведения вопросов
                </div>
                <div class="col-md-6">
                    <select name="question_behavior" class="form-select">
                        <option value="deferred">Отложенный отзыв</option>
                        <option value="immediate">Немедленный отзыв</option>
                        <option value="adaptive">Адаптивный режим</option>
                    </select>
                </div>
            </div>

            {{-- Показать больше --}}
            <a href="#" class="small text-primary"
               onclick="event.preventDefault(); toggleExtra(this)">
                Показать больше…
            </a>

            {{-- Дополнительные настройки --}}
            <div class="extra-options mt-3 d-none">

                <div class="row align-items-center mb-3">
                    <div class="col-md-4">
                        Разрешить несколько попыток
                    </div>
                    <div class="col-md-6">
                        <select name="multiple_attempts" class="form-select">
                            <option value="0">Нет</option>
                            <option value="1">Да</option>
                        </select>
                    </div>
                </div>

                <div class="row align-items-center mb-3">
                    <div class="col-md-4">
                        Показывать правильный ответ
                    </div>
                    <div class="col-md-6">
                        <select name="show_correct" class="form-select">
                            <option value="0">Нет</option>
                            <option value="1">Да</option>
                        </select>
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- Tags --}}
    <div class="mb-3">
        <label class="form-label">Теги</label>
        <input type="text" name="basic" class="form-control" value="{{ old('basic') }}">
    </div>


    <button class="btn btn-primary px-4">
        Сохранить
    </button>
@endsection

