<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('questions', function (Request $request) {
    $questions = \App\Models\Question::query()->with('answers')->orderBy('order')->get();

    $questions->each(fn($question) => $questions->sortBy('order'));

   return $questions;
});

Route::post('tests', function (Request $request) {
    $test = new \App\Models\Test;
    $test->date = date('Y-m-d');
    $test->generos = $request->generos;
    $test->save();

    foreach ($request->answers as $value) {
        $testAnswer = new \App\Models\AnswerTest();
        $testAnswer->test_id = $test->id;
        $testAnswer->answer_question_id = $value;
        $testAnswer->save();
    }

   return $test;
});
