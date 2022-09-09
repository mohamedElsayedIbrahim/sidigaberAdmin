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
        ->select('eductionalstudent.studentName','eductionalstudent.ssn','educationalfee.image_name')
        ->where('educationalfee.stype' ,'=' ,'مصروفات دراسية')
        ->whereNotNull('educationalfee.image_name')->paginate(15);

        return view('students.index',compact('students'));
    }

    public function bus()
    {
        $students = DB::table('educationalfee')
        ->join('eductionalstudent', 'educationalfee.ssn', '=', 'eductionalstudent.ssn')
        ->select('eductionalstudent.studentName','eductionalstudent.ssn','educationalfee.image_name')
        ->where('educationalfee.stype' ,'=' ,'اشتراك اتوبيس طلاب')
        ->whereNotNull('educationalfee.image_name')->paginate(15);
        
        return view('students.bus',compact('students'));
    }

    public function info(){
        $students = DB::table('eductionalstudent')->select('ssn','studentName')->paginate(15);
        return view('students.info',compact('students'));
    }

    public function edit($id)
    {
        $student = DB::table('eductionalstudent')->select('ssn','studentName')->where('ssn','=',$id)->first();
        if($student === null){
            return abort(404);
        }
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ssn'=>'required|min:14|max:14|string',
            'studentName'=>'required|min:4|max:100|string'
        ]);

        DB::table('educationalfee')->where('ssn','=',$id)->delete();
        DB::table('eductionalstudent')->where('ssn','=',$id)->update([
            'ssn'=>$request->ssn,
            'studentName'=> $request->studentName
        ]);

        DB::table('educationalfee')->insert([
            'ssn'=>$request->ssn,
            'feesYear' => '2022',
            'fees' => 12430.00,
            'stype'=>'مصروفات دراسية'
        ]);

        return redirect()->route('app.student.info')->with('message', 'updated successfully');
    }
}
