<?php

namespace App\Http\Controllers;

use App\Academicyear;
use App\Branch;
use App\Http\Requests\StoreSturentRequest;
use App\Http\Requests\UpdateSturentRequest;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        $students = Student::latest()->paginate(10);
        return view('students.index',['students'=>$students]);
    }

    public function create()
    {
        $branches = Branch::latest()->get();
        return view('students.create', ['branches'=>$branches]);
    }

    public function store(Student $student, StoreSturentRequest $request)
    {

        $student->create($request->validated());
        $year = Academicyear::where('year','=',Carbon::now()->format('Y').'/'.Carbon::now()->addYear()->format('Y'))->first();
        $student->enrollments(array_merge($request->all(),[
            'student'=>$request->id,
            'year'=>$year,
        ]));

        return redirect()->route('students.index')
                        ->with('success','student created successfully');
    }

    public function show(Student $student)
    {
        return view('students.show',['student'=>$student]);
    }

    public function edit(Student $student)
    {
        return view('students.edit',['student'=>$student]);
    }

    public function update(Student $student, UpdateSturentRequest $request)
    {

        $student->update($request->validated());

        return redirect()->route('students.index')
                        ->with('success','student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                        ->with('success','student deleted successfully');
    }
}
