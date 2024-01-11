<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Services\AdmissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AdmissionController extends Controller
{

    public function index()
    {
        $branches = array_map(function($branch){
            return $branch['alise'];
        },Auth::user()->branches->toArray());
        

        $data = AdmissionService::get_all_data($branches);

        return view('admissions.index',['branches'=>$branches,'data'=>$data]);
    }

    public function download() {
        $branches = array_map(function($branch){
            return $branch['alise'];
        },Auth::user()->branches->toArray());
        
        AdmissionService::download_all_data($branches);
        
    }
    
    public function student_info(Request $request){
        $data = AdmissionService::get_student_data($request->id);
        return response()->json($data);
    }
}
