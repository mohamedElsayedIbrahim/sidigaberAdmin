<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcadmicYearRequest;
use App\Http\Requests\UpdateAcadmicYearRequest;
use App\Models\Academicyear;
use Illuminate\Http\Request;

class AcademicyearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicyears = Academicyear::latest()->paginate(10);
        return view('academicyears.index',['academicyears'=>$academicyears]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academicyears.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Academicyear $academicyear, StoreAcadmicYearRequest $request)
    {
        $academicyear->create($request->validated());

        return redirect()->route('academicyears.index')
            ->withSuccess(__('academic year created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Academicyear  $academicyear
     * @return \Illuminate\Http\Response
     */
    public function show(Academicyear $academicyear)
    {
        return view('academicyears.show',['academicyears'=>$academicyear]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Academicyear  $academicyear
     * @return \Illuminate\Http\Response
     */
    public function edit(Academicyear $academicyear)
    {
        return view('academicyears.edit',['academicyears'=>$academicyear]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Academicyear  $academicyear
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcadmicYearRequest $request, Academicyear $academicyear)
    {
        $academicyear->update($request->validated());
        return redirect()->route('academicyears.index')
            ->withSuccess(__('academic year updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Academicyear  $academicyear
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academicyear $academicyear)
    {
        $academicyear->delete();
        return redirect()->route('academicyears.index')
            ->withSuccess(__('academic year Deleted successfully.'));
    }
}
