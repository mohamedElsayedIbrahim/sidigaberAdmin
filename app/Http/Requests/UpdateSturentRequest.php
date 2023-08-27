<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSturentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $student = request()->route('student');

        return [
            'id'=>'string|required|min:14,max:14,unique:students,id,'.$student->id,
            'fullname'=>'string|required',
            'gender'=>'string|required|in:male,female',
        ];
    }
}
