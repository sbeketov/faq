<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
     public function index() 
	{	
	
		$data = [
			'users' => User::all(),
		];

		
		return view('users.list', $data);
	}

	public function create() 
	{	$data = [
			'form' => '_common._form_user',
			'route' => 'user.store',
			'submitButton' => 'Добавить'
		];
		return view('actions.create', $data);
	}


	public function store(UserRequest $request) 
	{
		User::create([
			'name' => $request['name'],
			'password' => Hash::make($request['password'])
		]);

		return redirect('/user');
	}

	public function edit($id)
	{	$data = [
		'model' => User::findOrFail($id),
		'form' => '_common._form_user',
		'submitButton' => 'Сохранить',
		'action' => 'UsersController@update'
		];
		return view('actions.edit', $data);
	}

	public function update($id, UserRequest $request)
	{
		$model = User::findOrFail($id);
		$model->update([
			'name' => $request['name'],
			'password' => Hash::make($request['password'])
		]);

		return redirect('/user');
	}

	public function destroy($id)
	{
		$model = User::findOrFail($id)->delete();
		return redirect('/user');
	}
}
