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

    public function questionsCount0()
	{
	  return $this->questions()
	    ->selectRaw('category_id, count(*) as aggregate')
	    ->where('status', 0)
	    ->groupBy('category_id');
	}

	public function questionsCount1()
	{
	  return $this->questions()
	    ->selectRaw('category_id, count(*) as aggregate')
	    ->where('status', 1)
	    ->groupBy('category_id');
	}

	public function questionsCount2()
	{
	  return $this->questions()
	    ->selectRaw('category_id, count(*) as aggregate')
	    ->where('status', 2)
	    ->groupBy('category_id');
	}
}
