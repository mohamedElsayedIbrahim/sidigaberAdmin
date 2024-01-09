<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Requests\StoreStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::latest()->paginate(10);
        return view('stages.index',['stages'=>$stages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stages.create',['schools'=>Branch::latest()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Stage $stage, StoreStageRequest $request)
    {
        $record = $stage->create($request->validated());

        $record->branches()->sync($request->get('school'));

        return redirect()->route('stages.index')
            ->withSuccess(__('stage Created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        return view('stages.show',['stage'=>$stage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage)
    {
        $branches = Branch::get();
        return view('stages.edit',['stage'=>$stage,'stageBranches'=>$stage->branches->pluck('id')->toArray(),'schools'=>$branches]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStageRequest $request, Stage $stage)
    {
        $stage->update($request->validated());
        $stage->branches()->sync($request->get('school'));
        return redirect()->route('stages.index')
            ->withSuccess(__('stage Updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
        $stage->delete();
        return redirect()->route('stages.index')
            ->withSuccess(__('stage Deleted successfully.'));
    }
}
