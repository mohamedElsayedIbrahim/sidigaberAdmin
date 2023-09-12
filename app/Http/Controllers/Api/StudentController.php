<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    function get_all_students() : object {
        return $this->sendResponse(StudentService::api_students(request()->get('branches')));
    }
}
