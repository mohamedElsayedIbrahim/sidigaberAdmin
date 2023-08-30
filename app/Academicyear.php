<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academicyear extends Model
{
    protected $fillable = ['year'];

    function studentEnrollments(){
        return $this->hasMany(StudentEnrollments::class);
    }
}
