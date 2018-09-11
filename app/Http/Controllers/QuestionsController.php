<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Answer;
use App\Category;
use App\Question;
use App\Http\Requests\QuestionRequest;
use Request;

class QuestionsController extends Controller
{

	public function __construct()
	{
	    $this->middleware('auth', ['except' => 'store']);
	}
    
	public function index() 
	{	
	
		$data = [
			'questions' => Question::where('status', 0)->orderBy('created_at', 'desc')->get(),
		];

		
		return view('questions.list', $data);
	}
	
	public function show($id) 
	{	
	
		$data = [
			'question' => Question::findOrFail($id),
			'form' => '_common._form_answer',
		    'submitButton' => 'Добавить',
		    'status' => [
                1 => 'Опубликовано',
                2 => 'Скрыто'
                ]
		];
		
		return view('questions.add_answer', $data);

	}

	public function create() 
	{	
		$data = [
		'categoriesSelect' => Category::pluck('name', 'id'),
		'form' => '_common._form_question',
		'action' => 'QuestionsController@store',
		'submitButton' => 'Добавить',
		];
		return view('actions.create', $data);
	}


	public function store(QuestionRequest $request) 
	{
		Question::create($request->all());
		return redirect('/');
	}

	public function edit($id)
	{	$data = [
		'model' => Question::findOrFail($id),
		'categoriesSelect' => Category::pluck('name', 'id'),
		'status' => [
                0 => 'Ожидает ответа',
                1 => 'Опубликовано',
                2 => 'Скрыто'
            ],
		'form' => '_common._form_question_update',
		'action' => 'QuestionsController@update',
		'submitButton' => 'Сохранить',
		];
		return view('actions.edit', $data);
	}

	public function update($id, QuestionRequest $request)
	{
		$model = Question::findOrFail($id);
		$model->update($request->all());
		$referer = $request['referer'];

		return redirect($referer);
	}

	public function editStatus($id, $status)
	{	
	    
	    //dd($referer);
		$model = Question::findOrFail($id);
		$model->update([
			'status' => $status
		]);

		return redirect('/question');
	}

	public function destroy($id)
	{
		$model = Question::findOrFail($id)->delete();
		return redirect('/category');
	}

}