<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestResultStoreRequest;
use App\Http\Requests\TestResultUpdateRequest;
use App\Http\Requests\UserAnswerStoreRequest;
use App\Http\Requests\UserAnswerUpdateRequest;
use App\Models\User_Answer;
use Illuminate\Http\Request;

class UserAnswersController extends Controller
{
    public function index()
    {
        $user_answer=User_Answer::all();
        return view('user_answer.index',compact('user_answer'));
    }
    public function create()
    {
        return view('useranswer.create');
    }
    public function store(UserAnswerStoreRequest $request)
    {
        $data=$request->validated();
        User_Answer::create($data);
        return redirect()->route('useranswer.index')->with('success', 'Успешно добавлено!');
    }
    public function show(User_Answer $user_answer)
    {
        return view('useranswer.show',compact('user_answer'));
    }
    public function edit(User_Answer $user_answer)
    {
        return view('useranswer.edit',compact('user_answer'));
    }
    public function update(UserAnswerUpdateRequest $request,)
    {
        $data=$request->validated();
        User_Answer::update($data);
        return redirect('useranswer.index');
    }
    public function destroy(User_Answer $user_answer)
    {
        $user_answer->delete();
        return redirect()->route('useranswer.index');
    }
}
