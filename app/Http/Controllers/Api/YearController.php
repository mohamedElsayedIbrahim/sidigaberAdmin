<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AcademicyearService;
use Illuminate\Http\Request;

class YearController extends Controller
{
    function get_all_years() : object {
        return $this->sendResponse(AcademicyearService::api_allYears());
    }
}
