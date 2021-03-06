<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/','PageController@index');
Route::get('/home','HomeController@index')->name('home');
Route::resource('question', 'QuestionController');
Route::resource('answer', 'AnswerController');
Route::post('like-store', 'LikeController@likeStore')->name('likeStore');

