<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;

Route::resource('tests', TestController::class);
Route::resource('questions', QuestionController::class);
Route::resource('questions.answers', AnswerController::class);
Route::get('/dashboard', function () {
    return view ('admin.layouts.app');
});
Route::get('/test', function () {
    return view ('admin.test.create');
});
Route::get('/test/question', function () {
    return view ('admin.questions.show');
});
Route::get('/test/question/create', function () {
    return view ('admin.questions.create');
})->name('admin.questions.create');
Route::get('/test/question/true_false', function () {
    return view ('admin.variants.true_false_answer');
})->name('variants.true_false_answer');
Route::get('/test/question/short_answer', function () {
    return view ('admin.variants.short_answer');
})->name('variants.short_answer');
Route::get('/test/question/correspondence_answer', function () {
    return view ('admin.variants.correspondence_answer');
})->name('variants.correspondence_answer');
;
Route::get('/test/question/multipart_answer', function () {
    return view ('admin.variants.multipart_answer');
})->name('variants.multipart_answer');
// Главная
Route::get('/', function () {
    return view('welcome');
});
