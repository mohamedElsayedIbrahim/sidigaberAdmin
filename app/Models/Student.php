<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Student extends Model
{
    protected $fillable = [
        'id',
        'fullname',
        'gender',
    ];

    public function enrollments($request)
    {
        $Validate = Validator::make($request,['school'=>'required|exists:branches,id','stage'=>'required|exists:stages,id'],[],[]);

        if ($Validate->fails()) {
            $request['student']->delete();
            return false;
        }

      $record = DB::table('student_enrollments')->insertGetId([
            'academicyear_id'=>$request['year']->id,
            'branch_id'=>$request['school'],
            'stage_id'=>$request['stage'],
            'student_id'=>$request['student'],
            'updated_at'=>Carbon::now(),
            'created_at'=>Carbon::now()
        ]);
        
        return $record;
    }

    function studentEnrollments(){
        return $this->hasMany(StudentEnrollments::class);
    }
}
