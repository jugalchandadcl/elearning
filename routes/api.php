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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/question/{question}/retrive','QuestionController@retrive')->name('question.retrive');
Route::post('/questions/create','QuestionController@store')->name('question.store');
Route::post('/questions/{question}/edit/','QuestionController@update')->name('question.update');
// Route::get('/questions/retrive/learn/{learn}/user/{user}','QuestionController@retrive')->name('question.retrive');
// Route::post('/questions/destroy','QuestionController@destroy')->name('question.destroy');
Route::post('/answer/submit/{question}/{user}','AnswerController@store')->name('answer.store');
Route::post('/answer/{answer}/update','AnswerController@update')->name('answer.update');
Route::get('/answer/{answer}/retrive','AnswerController@retrive')->name('answer.retrive');

Route::get('/subject/{subject}/toggle/aprove','SubjectController@toggleAprove')->name('subject.toggle_aprove');
