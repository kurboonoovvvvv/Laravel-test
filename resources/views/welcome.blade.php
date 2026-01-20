@extends('admin.layouts.app')

@section('content')
    <style>
        .question-card {
            display: block;
            padding: 30px 20px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            text-decoration: none;
            color: #212529;
            transition: .2s ease;
            background: #fff;
        }

        .question-card:hover {
            border-color: #0d6efd;
            box-shadow: 0 4px 10px rgba(0,0,0,.1);
            transform: translateY(-3px);
        }

        .icon {
            font-size: 36px;
            margin-bottom: 12px;
        }

        .title {
            font-size: 14px;
            font-weight: 500;
        }
    </style>
    <div class="container">


        <h1 class="mb-4">Вибырите тип вопроса</h1>

        <div class="row g-4">

            {{-- Да / Нет --}}
            <div class="col-md-3">
                <a href="{{ route('true_false_answer') }}"
                   class="question-card text-center">
                    <div class="icon">✔</div>
                    <div class="title">Да / Нет</div>
                </a>
            </div>
            {{-- Короткий ответ --}}
            <div class="col-md-3">
                <a href="{{ route('variants.short_answer') }}"
                   class="question-card text-center">
                    <div class="icon">✎</div>
                    <div class="title">Короткий ответ</div>
                </a>
            </div>

            {{-- Соответствие --}}
            <div class="col-md-3">
                <a href="{{ route('variants.correspondence_answer') }}"
                   class="question-card text-center">
                    <div class="icon">⇄</div>
                    <div class="title">Соответствие</div>
                </a>
            </div>
            {{--Банк вопросов--}}
            <div class="col-md-3">
                <a href="{{ route('bank_answer') }}"
                   class="question-card text-center">
                    <div class="icon">📚</div>
                    <div class="title">Банк вопросов</div>
                </a>
            </div>

            {{-- Один / несколько правильных --}}
            <div class="col-md-3">
                <a href="{{ route('variants.multipart_answer')}}"
                   class="question-card text-center">
                    <div class="icon">☑</div>
                    <div class="title">Один или несколько<br>правильных ответов</div>
                </a>
            </div>

        </div>
    </div>
@endsection
