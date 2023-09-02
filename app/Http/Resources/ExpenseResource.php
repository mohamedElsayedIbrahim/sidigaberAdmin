<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'fees'=> $this->fees,
            'created'=>$this->created_at->format('d/m/y'),
            'pay'=> $this->pay == 0? 'un-paid':'paied',
            'id'=> $this->id,
            'student'=> $this->student_enrollment->student,
            'school'=> $this->student_enrollment->branch,
            'year' => $this->student_enrollment->academicyear,
            'stage' => $this->student_enrollment->stage,
            'type'=>$this->type,
        ];
    }
}
