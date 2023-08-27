<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = ['title'];

    function branches(){
        return $this->belongsToMany('App\Branch');
    }
}
