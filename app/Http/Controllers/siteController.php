<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class siteController extends Controller
{
    public function board()
    {
        $studentNumber = DB::table('educationalfee')
        ->join('eductionalstudent', 'educationalfee.ssn', '=', 'eductionalstudent.ssn')
        ->select('eductionalstudent.studentName','eductionalstudent.ssn','educationalfee.image_name')
        ->where('educationalfee.stype' ,'=' ,'مصروفات دراسية')
        ->count();

        $paied = DB::table('educationalfee')
        ->join('eductionalstudent', 'educationalfee.ssn', '=', 'eductionalstudent.ssn')
        ->select('eductionalstudent.studentName','eductionalstudent.ssn','educationalfee.image_name')
        ->where('educationalfee.stype' ,'=' ,'مصروفات دراسية')
        ->whereNotNull('educationalfee.image_name')->count();

        $busPaied = DB::table('educationalfee')
        ->join('eductionalstudent', 'educationalfee.ssn', '=', 'eductionalstudent.ssn')
        ->select('eductionalstudent.studentName','eductionalstudent.ssn','educationalfee.image_name')
        ->where('educationalfee.stype' ,'=' ,'اشتراك اتوبيس طلاب')
        ->count();
        
        return view('board', compact('studentNumber','paied','busPaied'));
    }
}