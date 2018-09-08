<?php

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

Route::get('doc', function () {
    return view('welcome');
});

Route::resource('question', 'QuestionsController');
Route::resource('category', 'CategoriesController');
Route::get('category/{id}/{status}', 'CategoriesController@questions');
Route::resource('user', 'UsersController');
Route::resource('answer', 'AnswersController');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('dashboard', 'DashboardController@index');
