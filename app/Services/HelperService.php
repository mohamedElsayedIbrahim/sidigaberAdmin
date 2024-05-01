<?php

namespace App\Services;

use App\Models\User;

class HelperService{
    public static function branch_ids(User $user) : Array {
        $ids = array_map(function($branch){
            return $branch['id'];
        },$user->branches->toArray());

        return $ids;
    }
}