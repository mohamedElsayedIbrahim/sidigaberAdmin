<?php

use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('json')->group(function(){
    Route::prefix('student')->group(function(){
        Route::post('show',[StudentController::class,'student_info']);
        Route::post('pay/recipt',[StudentController::class,'student_bank']);
        Route::post('get/payment/info',[StudentController::class,'student_data']);
        Route::get('expense/{id}/show',[ExpenseController::class,'show']);
    });
});
