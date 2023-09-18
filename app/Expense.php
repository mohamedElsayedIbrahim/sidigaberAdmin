<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['student_enrollment_id','fees','pay','type','payment_date','depoisit','front','back'];

    function student_enrollment() {
        return $this->belongsTo(StudentEnrollments::class);
    }

}