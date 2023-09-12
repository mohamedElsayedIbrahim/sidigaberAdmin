<?php

namespace App\Services;

use App\Student;

class StudentService {

    static function api_students($branches) {
        $query = explode(",",$branches);
        $students = Student::join('student_enrollments','student_enrollments.student_id','=','students.id')->Join('branches','student_enrollments.branch_id','=','branches.id')->select('students.id','students.fullname')->whereIn('student_enrollments.branch_id',$query)->get();

        return $students;
    }
}