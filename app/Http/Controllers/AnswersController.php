<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswersStoreRequest;
use App\Http\Requests\AnswersUpdateRequest;
use App\Http\Requests\TestStoreRequest;
use App\Http\Requests\TestUpdateRequest;
use App\Models\Answer;
use App\Models\Test;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function index()
    {
        $answers=Answer::all();
        return view('answers.index',compact('answers'));
    }
    public function create()
    {
        return view('answers.create');
    }
    public function store(AnswersStoreRequest $request)
    {
        $data = $request->validated();
        Answer::create($data);
        return redirect()->route('answers.index')->with('success', 'Пост успешно добавлен!');
    }
    public function show(Answer $answer)
    {
        return view('answers.show', compact('answer'));
    }
    public function edit(Answer $answer)
    {
        return view('answers.edit', compact('answer'));
    }
    public function update(AnswersUpdateRequest $request)
    {
        $data = $request->validated();
        Answer:update($data);
        return redirect()->route('answers.index')->with('success', 'Пост успешно обновлён!');
    }
    public function destroy(Answer $answer)
    {
        $answer->delete();
        return view('answers.show', compact('answer'));
    }
}
