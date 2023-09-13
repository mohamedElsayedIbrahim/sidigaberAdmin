<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Services\EnrollService;
use App\StudentEnrollments;
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

        $expenses = Expense::get();
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
        $upload = request()->get('upload_file');

        $expenses = Expense::get();

        if ($upload == null){
            return redirect()->route('expenses.index');
        } elseif($upload == "true") {
            $passed = $expenses->filter(function ($expense) {
                if(in_array($expense->student_enrollment->branch_id,array_map(function($branch){
                    return $branch['id'];
                },Auth::user()->branches->toArray())) && $expense->back !== null && $expense->front !== null){
                    return $expense;
                }
            });
        } else {
            $passed = $expenses->filter(function ($expense) {
                if(in_array($expense->student_enrollment->branch_id,array_map(function($branch){
                    return $branch['id'];
                },Auth::user()->branches->toArray())) && $expense->back == null && $expense->front == null){
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

        $expense->update([
            'pay'=>$status    
        ]);

        return back()->with('message','success');
    }
}
