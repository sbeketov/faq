<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Answer;
use App\Category;
use App\Question;
use App\Http\Requests\QuestionRequest;
//use Request;

class QuestionsController extends Controller
{
	

	public function faq() 
	{	
	
		$data = [ 
			'categories' => Category::with(['questions'=> function($q) {
			$q->where('status', 1)->orderBy('created_at', 'desc');
		}])->get(),
			'questions' => Question::get(),
			'answers' => Answer::orderBy('created_at', 'desc')->get(),
		];

		
		return view('questions.faq', $data);
	}

	public function index() 
	{	
	
		$data = [
			'questions' => Question::all(),
		];

		
		return view('questions.list', $data);
	}

	public function create() 
	{	$data = [
		'categories' => Category::pluck('name', 'id'),
		'form' => '_common._form_question',
		'route' => 'question.store',
		'submitButton' => 'Добавить'
		];
		return view('actions.create', $data);
	}


	public function store(QuestionRequest $request) 
	{
		dd($request);
		Question::create($request->all());
		return redirect('/');
	}

	public function edit($id)
	{	$data = [
		'model' => Question::findOrFail($id),
		'categories' => Category::pluck('name', 'id'),
		'form' => '_common._form_question',
		'submitButton' => 'Сохранить',
		'action' => 'QuestionsController@update'
		];
		return view('actions.edit', $data);
	}

	public function update($id, QuestionRequest $request)
	{
		$model = Question::findOrFail($id);
		$model->update($request->all());
		return redirect('/question');
	}

	public function destroy($id)
	{
		$model = Question::findOrFail($id)->delete();
		return redirect('/question');
	}

}