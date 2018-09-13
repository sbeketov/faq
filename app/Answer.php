<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Question;

class Answer extends Model
{
    protected $fillable = [
        'answer',
        'question_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
