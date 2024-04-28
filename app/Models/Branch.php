<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['title','alise'];

    function stages(){
        return $this->belongsToMany(Stage::class);
    }

    function users(){
        return $this->belongsToMany(User::class);
    }

    function studentEnrollments(){
        return $this->hasMany(StudentEnrollments::class);
    }

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'alise' => 'string'
    ];
}
