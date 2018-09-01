<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Category extends Model
{

	protected $fillable = [
		'name'
	];

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }

    public function questionsCount()
	{
	  return $this->questions()
	    ->selectRaw('category_id, count(*) as aggregate')
	    ->groupBy('category_id');
	}
}
