<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('educationalfee')
        ->join('eductionalstudent', 'educationalfee.ssn', '=', 'eductionalstudent.ssn')
        ->select('eductionalstudent.studentName','eductionalstudent.ssn','educationalfee.image')
        ->where('educationalfee.ServiceType' ,'=' ,'مصروفات دراسية')
        ->whereNotNull('educationalfee.image')->paginate(15);

        return view('students.index',compact('students'));
    }

    public function bus()
    {
        $students = DB::table('educationalfee')
        ->join('eductionalstudent', 'educationalfee.ssn', '=', 'eductionalstudent.ssn')
        ->select('eductionalstudent.studentName','eductionalstudent.ssn','educationalfee.image')
        ->where('educationalfee.ServiceType' ,'=' ,'اشتراك اتوبيس طلاب')
        ->whereNotNull('educationalfee.image')->paginate(15);
        
        return view('students.bus',compact('students'));
    }
}
