<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //Table name
    protected $fillable = ['name','slug','words','author','image'];
    
}
