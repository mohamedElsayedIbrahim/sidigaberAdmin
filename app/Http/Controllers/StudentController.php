<?php

namespace App\Http\Controllers;

use App\Models\Academicyear;
use App\Models\Branch;
use App\Models\Expense;
use App\Http\Requests\StoreSturentRequest;
use App\Http\Requests\UpdateSturentRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use App\Services\StudentService;
use App\Models\Stage;
use App\Models\Student;
use App\Models\StudentEnrollments;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(){
        $branches = array_map(function($branch){
            return $branch['id'];
        },Auth::user()->branches->toArray());

        $students = Student::join('student_enrollments','student_enrollments.student_id','=','students.id')->Join('branches','student_enrollments.branch_id','=','branches.id')->whereIn('student_enrollments.branch_id',$branches)->paginate(10);
        
        return view('students.index',['students'=>$students,'branches'=>$branches]);
    }

    public function create()
    {
        $branches = Branch::latest()->get();
        return view('students.create', ['branches'=>$branches]);
    }

    public function store(Student $student, StoreSturentRequest $request)
    {

        if (!StudentService::exisit_student($request->id)) {
            # code...
            return redirect()->route('students.index')->with('error','Student is already exisit');
        }

        $student->create($request->validated());
        $year = Academicyear::where('year','=',Carbon::now()->format('Y').'/'.Carbon::now()->addYear()->format('Y'))->first();
        $record = $student->enrollments(array_merge($request->all(),[
            'student'=>$request->id,
            'year'=>$year,
        ]));

        Expense::create([
            'student_enrollment_id'=>$record,
            'fees'=>$request->fees,
            'type'=>'school',
            'depoisit'=>$request->type,
            'dateEnd'=>Carbon::now()->addWeek(),
        ]);

        if (!UserService::is_exisit($request->id)) {
            # code...
            User::create([
                'name'=> $request->id,
                'password' => Hash::make($request->id),
                'email'=>"student-".$request->id."@app.com",
                'type'=>'student'
            ]);
        }
        
        
        return redirect()->route('students.index')
                        ->with('message','student created successfully');
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
        $student_id = $student->id;

        $student->update($request->validated());
        // $orginal = $student->getOriginal();
        
        $user= User::where('name','=',"$student_id")->first();

        if ($user) {
            # code...
            $user->delete();
        }

        User::create([
            'name'=> $request->id,
            'password' => Hash::make($request->id),
            'email'=>"student-".$request->id."@app.com",
        ]);

        return redirect()->route('students.index')
                        ->with('message','student updated successfully');
    }

    public function destroy(Student $student)
    {
        User::where('name','=',$student->id)->delete();
        
        $student->delete();

        return redirect()->route('students.index')
                        ->with('message','student deleted successfully');
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel'=>'required|mimes:xls,xlsx|file'
        ]);

        try {
            
            Excel::import(new StudentsImport, $request->file('excel'));
            
            if ($request->file('excel') != null) {
                $extention = $request->file('excel')->getClientOriginalExtension();
                $name = 'excel-'.uniqid().$extention;
                $request->file('excel')->storeAs('uploads/Excel/Import',$name);
            }

            return back()->with('message', 'All good!');

        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    public function search()
    {
        $search = request()->get('q');

        if ($search == null) {
            return redirect()->route('students.index');
        }

        $branches = array_map(function($branch){
            return $branch['id'];
        },Auth::user()->branches->toArray());

        $students = Student::join('student_enrollments','student_enrollments.student_id','=','students.id')->Join('branches','student_enrollments.branch_id','=','branches.id')->whereIn('student_enrollments.branch_id',$branches)->Where('students.fullname','like',"%$search%")->orWhere('students.id','like',"%$search%")->paginate(10);
        
        return view('students.index',['students'=>$students,'branches'=>$branches]);

    }
}
