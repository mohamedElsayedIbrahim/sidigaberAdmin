<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StageResource;
use App\Models\Branch;
use Illuminate\Http\Request;

class StageController extends Controller
{
    public function get_branch_stage(Branch $branch){
        return $this->sendResponse(StageResource::collection($branch->stages));
    }
}
