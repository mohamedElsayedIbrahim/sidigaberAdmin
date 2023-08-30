<?php

namespace App\Http\Controllers\Api;

use App\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    function index() : object {
        $branches = Branch::select('id','title')->get();
        return $this->sendResponse($branches);
    }
}
