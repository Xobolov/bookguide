<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    protected $table = 'questions_categories';
    protected $guarded = [];

    //Web -> Book.blade.php
    public function questions()
    {
        return $this->hasMany('App\Question','test_id','id')->orderByRaw('RAND()')->take(1);
    }

    //Admin Panel -> QuestionCategory Controller
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id' ,'id');
    }

}
