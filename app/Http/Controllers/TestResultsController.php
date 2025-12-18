<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestResultStoreRequest;
use App\Http\Requests\TestResultUpdateRequest;
use App\Models\Test_Result;
use Illuminate\Http\Request;

class TestResultsController extends Controller
{
    public function index()
    {
        $testresults=Test_Result::all();
        return view('testresults.index',compact('testresults'));
    }
    public function create()
    {
        return view('testresults.create');
    }
    public function store(TestResultStoreRequest $request)
    {
        $data=$request->validated();
        Test_Result::create($data);
        return redirect()->route('testresults.index')->with('success', 'Успешно добавлено!');
    }
    public function show(Test_Result $testresult)
    {
        return view('testresults.show',compact('testresult'));
    }
    public function edit(Test_Result $testresult)
    {
        return view('testresults.edit',compact('testresult'));
    }
    public function update(TestResultUpdateRequest $request,)
    {
        $data=$request->validated();
        Test_Result::update($data);
        return redirect('testresults.index');
    }
    public function destroy(Test_Result $testresult)
    {
        $testresult->delete();
        return redirect()->route('testresults.index');
    }
}
