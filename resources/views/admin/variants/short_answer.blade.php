@extends('admin.layouts.app')
@section('title')
@endsection

@section('header')
@endsection

@section('content')
    <form   action="#" method="post">
        @csrf
        <h3>Добавление вопроса Короткый ответ</h3>
        <label>Категория</label>
        <select name="category" class="form-control">
            <option>PHP</option>
            <option>C++</option>
            <option>C#</option>
        </select>
        <label>Название вопроса</label>
        <input type="text" class="form-control">
        <label>Description</label>
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

        <input type="hidden" name="description" id="description"><br>
        <label>Статус вопроса</label>
        <input type="text" class="form-control">
        <label>Балл по умолчанию</label>
        <select name="Ball" class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
        </select>
        <label>Общый отзыв к вопросу</label>
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

        <input type="hidden" name="description" id="description"><br>
        <label>ID-номер</label>
        <input type="number" class="form-control"><br>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Ответы</h5>
            </div>

            <div class="card-body" id="answers-wrapper">

                {{-- Вариант ответа --}}
                <div class="answer-item mb-4">
                    <div class="row mb-2">
                        <div class="col-md-8">
                            <label class="form-label">Вариант ответа 1</label>
                            <input type="text" name="answers[0][text]" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Оценка</label>
                            <select name="answers[0][score]" class="form-select">
                                <option value="">Пусто</option>
                                <option value="1">Правильный</option>
                                <option value="0">Неправильный</option>
                            </select>
                        </div>
                    </div>

                    <label class="form-label">Отзыв</label>
                    <textarea name="answers[0][feedback]" class="form-control feedback-editor" rows="4"></textarea>
                </div>

            </div>

            <div class="card-footer">
                <button type="button" id="add-answer" class="btn btn-outline-primary">
                    Добавить 3 варианта(ов) ответа(ов)
                </button>
            </div>
        </div>


        <input type="submit" value="Сохранить" class="btn btn-outline-success">
    </form>
@endsection
