@extends('admin.layouts.app')
@section('title')
@endsection

@section('header')
@endsection

@section('content')
    <form   action="#" method="post">
        @csrf
        <h3>Добавление вопроса Верно/Неверно</h3>
        <label>Категория</label>
        <select name="category" class="form-control">
            <option>PHP</option>
            <option>C++</option>
            <option>C#</option>
        </select>
        <label>Название</label>
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
        <input type="number" class="form-control">
        <label>Правилный ответ</label>
        <select class="form-control" name="is_correct">
            <option value="1">Верно</option>
            <option value="0">Неверно</option>
        </select>
        <label>Коментарый для ответа Верно</label>
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
        <label>Коментарый для ответа Неверно</label>
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
        <div class="mb-3">
            <label class="form-label">Теги</label>
            <input type="text" name="basic" class="form-control" value="{{ old('basic') }}">
        </div>
        <input type="submit" value="Сохранить" class="btn btn-outline-success">
    </form>
@endsection
