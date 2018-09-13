<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Question;
use App\Category;
use App\Answer;
use App\Http\Requests\AnswerRequest;
use Request;

class AnswersController extends Controller

{

	public function __construct()
	{
	    $this->middleware('auth');
	}

	public function index() 

	{	

	}

	public function create() 
	{	

	}

	public function store(AnswerRequest $request) 
	{

		Answer::create($request->all());
		$id = $request['question_id'];
		$status = $request['status'];
		
		return redirect()->action('QuestionsController@editStatus', [$id, $status]);
	}

	public function edit($id)
	{	
		$data = [
		'model' => Answer::findOrFail($id),
		'form' => '_common._form_answer',
		'submitButton' => 'Сохранить',
		'action' => 'AnswersController@update'
		];

		return view('actions.edit', $data);
	}

	public function update($id, AnswerRequest $request)
	{
		$model = Answer::findOrFail($id);
		$model->update($request->all());
		$referer = $request['referer'];

		return redirect($referer);
	}
	
		public function destroy($id)
	{
		$model = Answer::findOrFail($id)->delete();

		return redirect()->back();
	}

}