<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentEnrollResource;
use App\Http\Resources\StudentFullResource;
use App\Models\Expense;
use App\Models\Student;
use App\Models\StudentEnrollments;
use App\Models\User;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    function get_all_students() : object {
        return $this->sendResponse(StudentService::api_students(request()->get('branches')));
    }

    function student_info(Request $request) : object {
        $validator = Validator::make($request->all(),[
            'student' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->sendError('الرقم القومى خطأ',$validator->errors(),200);
        }

        $data = User::where('name','=',$request->student)->first();
        if ($data !== null) {
            return $this->sendResponse([
                'user'=> $request->student
            ]);
        }

        return $this->sendError('لايوجد بيانات لهذا الرقم',[],200);
    }

    function student_data(Request $request) :object {
       $enrollments = StudentEnrollments::where('student_id','=',$request->student)->first();
       return $this->sendResponse(new StudentFullResource($enrollments));
       
    }

    function student_bank(Request $request){

        $expens = Expense::find($request->student);
        
        if ($expens !== null) {
            return $this->sendError('Bad id number',[],200);
        }

        $expens->update([
            'front'=>$request->front,
            'back'=>$request->back,
        ]);

        return $this->sendResponse([],'message is done');
    }
}
