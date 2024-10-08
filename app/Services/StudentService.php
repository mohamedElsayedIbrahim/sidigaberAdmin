<?php

namespace App\Services;

use App\Models\Student;

class StudentService {

    static function api_students($branches) {
        $query = explode(",",$branches);
        $students = Student::join('student_enrollments','student_enrollments.student_id','=','students.id')->Join('branches','student_enrollments.branch_id','=','branches.id')->select('students.id','students.fullname')->whereIn('student_enrollments.branch_id',$query)->where('student_enrollments.academicyear_id', '=' , AcademicyearService::current_year_id())->get();

        return $students;
    }

    static function exisit_student($id) : bool {
        $student = Student::find($id);

        if ($student == null) {
            # code...
            return true;
        }

        return false;

    }
}