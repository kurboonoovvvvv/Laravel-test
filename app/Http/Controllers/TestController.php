<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestStoreRequest;
use App\Http\Requests\TestUpdateRequest;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $test=Test::all();
        return view('test.index',compact('test'));
    }
    public function create()
    {
        return view('test.create');
    }
    public function store(TestStoreRequest $request)
    {
        $data = $request->validated();
        Test::create($data);
        return redirect()->route('test.index')->with('success', 'Пост успешно добавлен!');
    }
    public function show(Test $test)
    {
        return view('test.show', compact('test'));
    }
    public function edit(Test $test)
    {
        return view('test.edit', compact('test'));
    }
    public function update(TestUpdateRequest $request)
    {
        $data = $request->validated();
        Test:update($data);
        return redirect()->route('test.index')->with('success', 'Пост успешно обновлён!');
    }
    public function destroy(Test $test)
    {
        $test->delete();
        return view('test.show', compact('test'));
    }
}
