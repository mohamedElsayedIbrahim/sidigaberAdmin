<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentEnrollments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class siteController extends Controller
{
    public function board()
    {
        $branches = array_map(function($branch){
            return $branch['id'];
        },Auth::user()->branches->toArray());
        
        $student = Student::Join('student_enrollments','students.id','=','student_enrollments.student_id')->
        select(DB::raw('count(students.id) as count'))->whereIn('student_enrollments.branch_id',$branches)->first();

        $paied = Student::Join('student_enrollments','students.id','=','student_enrollments.student_id')->Join('expenses','expenses.student_enrollment_id','=','student_enrollments.id')->
        select(DB::raw('count(students.id) as count'))->where('expenses.pay','=',1)->where('expenses.type','=','school')->whereIn('student_enrollments.branch_id',$branches)->first();

        
        return view('board', ['student'=> $student,'paied'=>$paied]);
    }
}