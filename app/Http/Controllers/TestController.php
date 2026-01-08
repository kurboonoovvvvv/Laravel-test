<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return Test::all();
    }

    public function store(Request $request)
    {
        return Test::create($request->only('title', 'description'));
    }

    public function show(Test $test)
    {
        return $test->load('questions');
    }

    public function update(Request $request, Test $test)
    {
        $test->update($request->only('title', 'description'));
        return $test;
    }

    public function destroy(Test $test)
    {
        $test->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
