<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['student_enrollment_id','fees','pay','type','payment_date','depoisit','front','back','dateEnd'];

    function student_enrollment() {
        return $this->belongsTo(StudentEnrollments::class);
    }

}