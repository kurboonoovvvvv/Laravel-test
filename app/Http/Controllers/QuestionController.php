<?php

namespace App\Http\Controllers;

use App\Models\{Question, Single_choice_answer, Multiple_choice_answer, Boolean_answer, Short_answer, Test};
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        return view('admin.answers.create', [
            'tests' => Test::all()
        ]);
    }

    public function store(Request $request)
    {
        $question = Question::create(
            $request->only('test_id', 'question', 'type')
        );

        switch ($question->type) {
            case 'single':
                foreach ($request->answers as $a) {
                    Single_choice_answer::create($a + ['question_id' => $question->id]);
                }
                break;

            case 'multiple':
                foreach ($request->answers as $a) {
                    Multiple_choice_answer::create($a + ['question_id' => $question->id]);
                }
                break;

            case 'boolean':
                Boolean_answer::create([
                    'question_id' => $question->id,
                    'correct' => $request->correct
                ]);
                break;

            case 'short':
                Short_answer::create([
                    'question_id' => $question->id,
                    'correct_answer' => $request->correct_answer
                ]);
                break;
        }

        return $question;
    }

    public function show(Question $question)
    {
        return $question->load([
            'singleAnswers',
            'multipleAnswers',
            'booleanAnswer',
            'shortAnswer'
        ]);
    }
    public function edit($id)
    {
        $question = Question::with('answers')->findOrFail($id); // подгружаем вопрос с ответами
        $tests = Test::all(); // список тестов для select

        return view('admin.answers.edit', compact('question', 'tests'));
    }


    public function update(Request $request, Question $question)
    {
        $question->update($request->only('question'));
        return $question;
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
