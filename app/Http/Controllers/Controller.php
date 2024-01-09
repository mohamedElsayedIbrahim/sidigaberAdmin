<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function sendResponse($data = [],$message = "success") : object {
        
        $response = [
            'type'=>'success',
            'data'=>$data,
            'message'=>$message
        ];

        return response()->json($response,200);
    }

    function sendError($message, $data = [], $code = 404) : object {
        
        $response = [
            'type'=>'error',
            'data'=>$data,
            'message'=>$message
        ];

        return response()->json($response,$code);
        
    }
}
