<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Question;
use App\Http\Requests\CategoriesRequest;


class CategoriesController extends Controller
{	
	public function __construct()
	{
	    $this->middleware('auth');
	}
	
	public function index() 
	{	
	
		$data = [
			'categories' => Category::with([
				'questionsCount'=> function($q) {
			    $q;
				},
				'questionsCount0'=> function($q) {
			    $q;
				},
				'questionsCount1'=> function($q) {
			    $q;
				},
				'questionsCount2'=> function($q) {
			    $q;
				},

			])->get(),
		'text' => 'Новая категория:',
		'form' => '_common._form_category',
		'url' => '/category',
		'submitButton' => 'Добавить'
		];
			
		return view('categories.list', $data);
	}

	public function show($id)
	{
		$data = [
			'category' => Category::findOrFail($id),
			'questions' => Question::where('category_id', $id)->get(),
			'status' => [
                0 => 'Ожидает ответа',
                1 => 'Опубликовано',
                2 => 'Скрыто'
                ]
		];
		
		$links = session()->has('links') ? session('links') : [];
        $currentLink = request()->path(); // Getting current URI like 'category/books/'
        array_unshift($links, $currentLink); // Putting it in the beginning of links array
        session(['links' => $links]); // Saving links array to the session
		
		return view('categories.questions', $data);
	}
	
	
	public function questionsList($id, $status)
	{
	    $data = [
	        
            'category' => Category::findOrFail($id),
            'questions' => Question::where('category_id', $id)->where('status', $status)->get(),
            'status' => [
                0 => 'Ожидает ответа',
                1 => 'Опубликовано',
                2 => 'Скрыто'
                ]
		];
		
		$links = session()->has('links') ? session('links') : [];
        $currentLink = request()->path(); // Getting current URI like 'category/books/'
        array_unshift($links, $currentLink); // Putting it in the beginning of links array
        session(['links' => $links]); // Saving links array to the session
		
		return view('categories.questions', $data);
	}
	
    public function create() 
	{
	}


	public function store(CategoriesRequest $request) 
	{
		Category::create($request->all()); 	
		return redirect('/category');

	}

	public function edit($id)
	{	
		$data = [
		'model' => Category::findOrFail($id),
		'form' => '_common._form_category',
		'submitButton' => 'Сохранить',
		'action' => 'CategoriesController@update',
		'text' => 'Новое название:',
		
		];
		return view('actions.edit', $data);
	}

	public function update($id, CategoriesRequest $request)
	{
		$model = Category::findOrFail($id);
		$model->update($request->all());
		return redirect('/category');
	}

	public function destroy($id)
	{
		$model = Category::findOrFail($id)->delete();
		return redirect()->back();
	}
}
