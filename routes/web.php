<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;

Route::resource('tests', TestController::class);
Route::resource('questions', QuestionController::class);
Route::resource('questions.answers', AnswerController::class);

// Главная
Route::get('/', function () {
    return view('welcome');
});
