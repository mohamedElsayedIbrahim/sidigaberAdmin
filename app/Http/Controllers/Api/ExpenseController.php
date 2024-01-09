<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExpenseResource;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    function show($expense) : object {
        $expense = Expense::find($expense);
        return $this->sendResponse(new ExpenseResource($expense));
    }
}
