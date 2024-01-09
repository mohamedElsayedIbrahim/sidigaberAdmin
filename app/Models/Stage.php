<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = ['title'];

    function branches(){
        return $this->belongsToMany('App\Branch');
    }

    function studentEnrollments(){
        return $this->hasMany(StudentEnrollments::class);
    }
}
