<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class StudentEnrollments extends Model
{
    protected $table = 'student_enrollments';
    protected $primary_key = 'id';
    protected $fillable =['student_id'];

    function Student(){
        return $this->belongsTo(Student::class);
    }

    function branch(){
        return $this->belongsTo(Branch::class);
    }

    function stage(){
        return $this->belongsTo(Stage::class);
    }

    function academicyear(){
        return $this->belongsTo(Academicyear::class);
    }

    function expenses(){
        return $this->hasMany(Expense::class);
    }
}
