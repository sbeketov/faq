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
            'categoriesSelect' => Category::pluck('name', 'id'),
            'form' => '_common._form_question',
            'url' => '/question',
            'submitButton' => 'Задать вопрос',
        ];
        
        return view('home', $data);
    }
}
