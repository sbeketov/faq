<?php



namespace App\Http\Controllers;



use App\Http\Requests;

use App\Question;

use App\Category;

use App\Answer;

use App\Http\Requests\AnswerRequest;

//use Request;



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

	{	$data = [

		'form' => '_common._form_answer',

		'submitButton' => 'Добавить'

		];

		return view('actions.create', $data);

	}

	public function store(AnswerRequest $request) 

	{

	    //dd($request);

		Answer::create($request->all());

		return redirect('/category');

	}

	public function edit($id)

	{	$data = [

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

		return redirect('/category');

	}


	public function destroy($id)

	{

		$model = Answer::findOrFail($id)->delete();

		return redirect('/category');

	}

}