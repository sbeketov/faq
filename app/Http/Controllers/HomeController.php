<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Category;
use App\Question;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [ 
            'categories' => Category::with(['questions'=> function($q) {
            $q->where('status', 1)->orderBy('created_at', 'desc');
        }])->get(),
            'answers' => Answer::orderBy('created_at', 'desc')->get(),
            'categoriesSelect' => Category::pluck('name', 'id'),
            'route' => 'question.store',
            'submitButton' => 'Задать вопрос'
        ];
        
        return view('home', $data);
    }
}
