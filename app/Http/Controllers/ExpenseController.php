<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Services\EnrollService;
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
        $expense = Expense::join('student_enrollments','student_enrollments.id','expenses.student_enrollment_id')->whereIn('student_enrollments.branch_id',$branches)->paginate(10);

        return view('expenses.index',['expenses'=>$expense,'branches'=>$branches]);
    }

    public function search()
    {
        $branches = array_map(function($branch){
            return $branch['id'];
        },Auth::user()->branches->toArray());
        $upload = request()->get('upload_file');

        if ($upload == null){
            return redirect()->route('expenses.index');
        } elseif($upload == "true") {
            $expense = Expense::join('student_enrollments','student_enrollments.id','expenses.student_enrollment_id')->whereIn('student_enrollments.branch_id',$branches)->WhereNotNull('expenses.back')->WhereNotNull('expenses.front')->paginate(10);
        } else {
        $expense = Expense::join('student_enrollments','student_enrollments.id','expenses.student_enrollment_id')->whereIn('student_enrollments.branch_id',$branches)->whereNull('expenses.back')->whereNull('expenses.front')->paginate(10);
        }
        return view('expenses.index',['expenses'=>$expense]);

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
        //
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

        $expense->update([
            'pay'=>$status    
        ]);

        return back()->with('message','success');
    }
}
