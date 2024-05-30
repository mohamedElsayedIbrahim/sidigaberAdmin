<?php

namespace App\Services;

use App\Models\Student;
use App\Models\User;

class UserService {

    static public function is_exisit($id) : bool {
        $user = User::where('name','=',$id)->first();

        if ($user != null) {
            # code...
            return true;
        }

        return false;
    }
}