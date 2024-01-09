<?php

namespace App\Services;

use App\Models\StudentEnrollments;

class EnrollService{
    static function get_enrollment_id(String $student, Int $year) {
        $enrollment = StudentEnrollments::where('student_id','=',$student)->where('academicyear_id','=',$year)->first();
        return $enrollment;
    }
}