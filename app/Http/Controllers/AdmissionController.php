<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{

    public function index()
    {
        $branches = array_map(function($branch){
            return $branch['id'];
        },Auth::user()->branches->toArray());
        
        return view('admissions.index',['branches'=>$branches]);
    }
    
}
