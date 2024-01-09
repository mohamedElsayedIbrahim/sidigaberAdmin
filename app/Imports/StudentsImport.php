<?php

namespace App\Imports;

use App\Models\Academicyear;
use App\Models\Expense;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
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
                'type'=>$row['type'],
                'depoisit'=>$row['depoisit']
            ]);
            // I1$@vGU8L@Iu
            User::create([
                'name'=> $row['nid'],
                'password' => Hash::make($row['nid']),
                'email'=>"student-".$row['nid']."@app.com",
                'type'=>'student'
            ]);
        }

    }
}
