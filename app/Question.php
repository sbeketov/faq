<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Answer;


class Question extends Model
{
	protected $fillable = [
		'name',
		'author',
		'email',
		'category_id'
	];

	public function category()
	{
    	return $this->belongsTo(Category::class);
    }

    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }


}
