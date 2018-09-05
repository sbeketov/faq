<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests\AdminRequest;

class AdminsController extends Controller
{
    
    public function index() 
	{	
	
		$data = [
			'admins' => Admin::all(),
		];

		
		return view('admins.list', $data);
	}

	public function create() 
	{	$data = [
		'form' => '_common._form_admin',
		'route' => 'admin.store',
		'submitButton' => 'Добавить'
		];
		return view('actions.create', $data);
	}


	public function store(AdminRequest $request) 
	{
		Admin::create($request->all());
		return redirect('/admin');
	}

	public function edit($id)
	{	$data = [
		'model' => Admin::findOrFail($id),
		'form' => '_common._form_admin',
		'submitButton' => 'Сохранить',
		'action' => 'AdminsController@update'
		];
		return view('actions.edit', $data);
	}

	public function update($id, AdminRequest $request)
	{
		$model = Admin::findOrFail($id);
		$model->update($request->all());
		return redirect('/admin');
	}

	public function destroy($id)
	{
		$model = Admin::findOrFail($id)->delete();
		return redirect('/admin');
	}
}
