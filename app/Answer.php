<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Question;

class Answer extends Model
{
    public function category()
	{
    	return $this->belongsTo(Question::class);
    }
}
