<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Question;
use App\Http\Requests\CategoryRequest;


class CategoriesController extends Controller
{	
	
	public function index() 
	{	
	
		$data = [
			'categories' => Category::with(['questionsCount'=> function($q) {
			    $q->where('status', 1)->first();
			}])->get(),
			'questionsCount' => Question::get()
		];
		
		//dd($data);
		
		return view('categories.list', $data);
	}

    public function create() 
	
	{
		$data = [
		'form' => '_common._form_category',
		'route' => 'category.store',
		'submitButton' => 'Добавить'
		];
		return view('actions.create', $data);
	}


	public function store(Request $request) 
	{
		Category::create($request->all()); 	
		return redirect('/category');

	}

	public function edit($id)
	{	$data = [
		'model' => Category::findOrFail($id),
		'form' => '_common._form_category',
		'submitButton' => 'Сохранить',
		'action' => 'CategoriesController@update'
		
		];
		return view('actions.edit', $data);
	}

	public function update($id, Request $request)
	{
		$model = Category::findOrFail($id);
		$model->update($request->all());
		return redirect('/category');
	}

	public function destroy($id)
	{
		$model = Category::findOrFail($id)->delete();
		return redirect('/category');
	}

}
