<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['student_enrollment_id','fees','pay','type','payment_date'];

    function student_enrollment() {
        return $this->belongsTo(StudentEnrollments::class);
    }

}