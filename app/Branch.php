<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['title'];

    function stages(){
        return $this->belongsToMany('App\Stage');
    }
}
