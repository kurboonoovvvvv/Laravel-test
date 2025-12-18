<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionsStoreRequest;
use App\Http\Requests\QuestionsUpdateRequest;
use App\Http\Requests\TestStoreRequest;
use App\Http\Requests\TestUpdateRequest;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions=Question::all();
        return view('questions.index',compact('questions'));
    }
    public function create()
    {
        return view('questions.create');
    }
    public function store(QuestionsStoreRequest $request)
    {
        $data = $request->validated();
        Question::create($data);
        return redirect()->route('questions.index')->with('success', 'Пост успешно добавлен!');
    }
    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }
    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }
    public function update(QuestionsUpdateRequest $request)
    {
        $data = $request->validated();
        Question:update($data);
        return redirect()->route('questions.index')->with('success', 'Пост успешно обновлён!');
    }
    public function destroy(Question $question)
    {
        $question->delete();
        return view('questions.show', compact('question'));
    }
}
