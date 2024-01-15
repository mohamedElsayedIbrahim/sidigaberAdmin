<?php

namespace App\Http\Resources;

use App\Models\Expense;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentFullResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'student'=>$this->student,
            'branch'=>$this->branch,
            'year'=>$this->academicyear,
            'stage'=>$this->stage,
            'expenses'=>Expense::where('student_enrollment_id','=',$this->id)->get()
        ];
    }
}
