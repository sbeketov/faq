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
        
        $links = session()->has('links') ? session('links') : [];
        $currentLink = request()->path(); // Getting current URI like 'category/books/'
        array_unshift($links, $currentLink); // Putting it in the beginning of links array
        session(['links' => $links]); // Saving links array to the session
    
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
    }


    public function store(QuestionRequest $request)
    {
        Question::create($request->all());
        $data =[
            'message' => 'Вопрос успешно добавлен',
            'back' => 'списку вопросов-ответов'
            ];
        return view('/success', $data);
    }

    public function edit($id)
    {
        $data = [
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
        //dd(session('links'));
        $model = Question::findOrFail($id);
        $model->update([
            'status' => $status
        ]);

        return redirect(session('links')[0]);
    }

    public function destroy($id)
    {
        $model = Question::findOrFail($id)->delete();
        return redirect()->back();
    }
}
