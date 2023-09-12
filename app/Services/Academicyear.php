<?php

namespace App\Services;

use App\Academicyear;
use Carbon\Carbon;

class AcademicyearService {
    public static function current_year() {
        $year = Academicyear::where('year','=',Carbon::now()->format('Y').'/'.Carbon::now()->addYear()->format('Y'))->first();
        return $year;
    }

    public static function allYears()
    {
        return Academicyear::all();
    }

    public static function api_allYears()
    {
        return Academicyear::select('id','year')->get();
    }
}