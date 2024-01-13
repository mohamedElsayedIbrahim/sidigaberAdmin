<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Student;
use App\Services\EnrollService;
use App\Models\StudentEnrollments;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = array_map(function($branch){
            return $branch['id'];
        },Auth::user()->branches->toArray());

        $expenses = Expense::orderBy('updated_at','DESC')->get();
        $passed = $expenses->filter(function ($expense) {
            if(in_array($expense->student_enrollment->branch_id,array_map(function($branch){
                return $branch['id'];
            },Auth::user()->branches->toArray()))){
                return $expense;
            }
        });

        
        return view('expenses.index',['expenses'=>$passed,'branches'=>$branches]);
    }

    public function search()
    {
        $branches = array_map(function($branch){
            return $branch['id'];
        },Auth::user()->branches->toArray());

        
        $expenses = Expense::where(function(Builder $query){
            if (request()->get('upload_file') != null && request()->get('upload_file') == "true") {
                $query->whereNotNull('front')->whereNotNull('back');
            }
            if (request()->get('upload_file') != null && request()->get('upload_file') == "false") {
                $query->whereNull('front')->whereNull('back');
            }
            if (request()->get('paied_status') != null && request()->get('paied_status') == "true") {
                $query->where('pay',1);
            }
            if (request()->get('paied_status') != null && request()->get('paied_status') == "false") {
                $query->where('pay',0);
            }
        })->orderBy('updated_at','DESC')->get();

        if (request()->get('upload_file') == null){
            return redirect()->route('expenses.index');
        } else {
            $passed = $expenses->filter(function ($expense) {
                if(in_array($expense->student_enrollment->branch_id,array_map(function($branch){
                    return $branch['id'];
                },Auth::user()->branches->toArray()))){
                    return $expense;
                }
            });
        }
        return view('expenses.index',['expenses'=>$passed]);

    }

    public function bus_expenses(Request $request) {
        $request->validate([
            'year'=>'required|exists:academicyears,id',
            'expense'=>'required',
            'students'=>'required',
            'students:*'=>'exists:students,id'
        ]);

        try {
            foreach($request->students as $student)
            {
                $id = EnrollService::get_enrollment_id($student,$request->year)->id;
                Expense::create([
                    'student_enrollment_id'=>$id,
                    'fees'=>$request->expense,
                    'type'=>'bus',
                    'depoisit'=>'سنة دراسية'
                ]);
            }

            return back()->with('message',__('success.submitted'));
        } catch (\Throwable $th) {
            return back()->with('message',$th->getMessage());
        }
    }

    function school_expenses(Request $request) {
        $request->validate([
            'yearSchool'=>'required|exists:academicyears,id',
            'expense'=>'required',
            'type'=>'required',
        ]);

        $branches = array_map(function($branch){
            return $branch['id'];
        },Auth::user()->branches->toArray());

        $students = StudentEnrollments::whereIn('branch_id',$branches)->get();

        foreach($students as $student)
        {
            Expense::create([
                'student_enrollment_id'=>$student->id,
                'fees'=>$request->expense,
                'type'=>'school',
                'depoisit'=>$request->type
            ]);
        }

        return back()->with('message','Sccussfuly done!');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return back()->with('message','student deleted successfully');
    }

    public function update_status(Request $request, $id) {
        $request->validate([
            'paymentStatus'=>'required|string|in:paid,un-paid'
        ]);

        $expense = Expense::find($id);

        if($expense == null)
        {
            return back()->with('error',__('dashboard.error'));
        }

        $status = $request->paymentStatus == 'paid' ? '1' : '0';

        if ($status == 1) {
            $expense->update([
                'pay'=>$status,
                'payment_date'=>Carbon::now(),   
            ]);
        } else {
            $expense->update([
                'pay'=>$status,
                'back'=>null,   
                'front'=>null,   
            ]);
        }
        

        return back()->with('message','success');
    }
}
