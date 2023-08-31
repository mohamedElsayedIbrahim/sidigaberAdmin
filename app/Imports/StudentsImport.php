<?php

namespace App\Imports;

use App\Academicyear;
use App\Expense;
use App\Student;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection (Collection $rows)
    {

        $year = Academicyear::where('year','=',Carbon::now()->format('Y').'/'.Carbon::now()->addYear()->format('Y'))->first();
        
        foreach ($rows as $row) 
        {

            print_r($row);
            $student = Student::create([
                'id'=> $row['nid'],
                'fullname' => $row['name'],
                'gender' => $row['gender'],
            ]);

            $record = $student->enrollments([
                'student'=>$row['nid'],
                'year'=>$year,
                'school'=>$row['school'],
                'stage'=>$row['stage'],
            ]);

            Expense::create([
                'student_enrollment_id'=>$record,
                'fees'=>$row['fees'],
                'type'=>$row['type']
            ]);
        }

    }
}
