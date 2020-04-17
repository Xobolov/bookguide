<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    // public function choices()
    // {
    //     return $this->hasMany('App\Choice','test_id','id');
    // }

    public function test()
    {
        return $this->hasOne(QuestionCategory::class, 'id' ,'test_id');
    }

    public function book()
    {
        return $this->hasOne(Book::class,'id','book_id');
    }
}
