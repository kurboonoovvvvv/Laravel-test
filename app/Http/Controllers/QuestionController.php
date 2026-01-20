<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    // Страница с модальным окном и списком вопросов
    public function index()
    {
        $questions = Question::all(); // получаем все вопросы
        return view('questions.index', compact('questions')); // передаём в Blade
    }

    // Сохранение нового вопроса
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'score' => 'required|numeric|min:0',
        ]);

        Question::create([
            'title' => $request->title,
            'description' => $request->description,
            'score' => $request->score,
        ]);

        return redirect()->route('questions.index')->with('success', 'Вопрос успешно добавлен!');
    }


}
