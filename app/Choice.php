<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $guarded = [];

    public function test()
    {
        return $this->belongsTo(QuestionCategory::class, 'test_id', 'id');
    }
}
