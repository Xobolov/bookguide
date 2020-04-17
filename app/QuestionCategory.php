<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    protected $table = 'questions_categories';
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany('App\Question','test_id','id')->orderByRaw('RAND()')->take(1);
    }

    public function book()
    {
        return $this->hasOne(Book::class, 'id' ,'book_id');
    }

}
