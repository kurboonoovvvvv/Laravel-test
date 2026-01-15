@extends('admin.layouts.app')
@section('title')
@endsection

@section('header')
@endsection

@section('content')
    <div class="accordion">

        {{-- Общее --}}
        <div class="acc-item">
            <div class="acc-header" onclick="toggleAcc(this)">
                ▶ Общее
            </div>
            <div class="acc-body">
                <label>Название вопроса</label>
                <input type="text" name="title">

                <label>Текст вопроса</label>
                <textarea name="text"></textarea>
            </div>
        </div>

        {{-- Ответы --}}
        <div class="acc-item">
            <div class="acc-header" onclick="toggleAcc(this)">
                ▶ Ответы
            </div>
            <div class="acc-body">
                @for($i=1;$i<=3;$i++)
                    <div class="answer-row">
                        <input type="text" placeholder="Вариант ответа {{ $i }}">
                        <select>
                            <option>Пусто</option>
                            <option>Верно</option>
                            <option>Неверно</option>
                        </select>
                    </div>
                @endfor
            </div>
        </div>

    </div>
    <style>
        .modal-backdrop{
            display:none;
            position:fixed;
            inset:0;
            background:rgba(0,0,0,.4);
        }
        .modal{
            width:600px;
            background:#fff;
            margin:10% auto;
            padding:20px;
            border-radius:8px;
        }
        .modal-header{
            display:flex;
            justify-content:space-between;
        }
        .question-types{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:15px;
            margin-top:20px;
        }
        .q-type{
            border:1px solid #ddd;
            padding:15px;
            text-align:center;
            cursor:pointer;
            border-radius:6px;
        }
        .q-type:hover{
            background:#f3f6ff;
            border-color:#3b82f6;
        }

        .accordion{
            margin-top:30px;
        }
        .acc-header{
            cursor:pointer;
            font-weight:600;
            padding:10px;
            border-bottom:1px solid #ddd;
        }
        .acc-body{
            max-height:0;
            overflow:hidden;
            transition:max-height .3s ease;
            padding:0 10px;
        }
        .acc-item.active .acc-body{
            max-height:500px;
            padding:10px;
        }
        .answer-row{
            display:flex;
            gap:10px;
            margin-bottom:10px;
        }
    </style>
    <script>
        function openQuestionModal(){
            document.getElementById('questionModal').style.display='block';
        }
        function closeQuestionModal(){
            document.getElementById('questionModal').style.display='none';
        }

        function toggleAcc(el){
            el.parentElement.classList.toggle('active');
        }

        function selectType(type){
            console.log('Тип вопроса:', type);
            closeQuestionModal();
        }
    </script>

@endsection
