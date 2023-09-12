<?php

use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\StageController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\YearController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController as ControllersBranchController;
use App\Http\Controllers\ExpenseController as ControllersExpenseController;
use App\Http\Controllers\siteController;
use App\Http\Controllers\StageController as ControllersStageController;
use App\Http\Controllers\StudentController as ControllersStudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('site.lang')->group(function(){

 
    /**
     * Home Routes
     */
    Route::get('/ar', [LangController::class,'ar'])->name('lang.ar');
    Route::get('/en', [LangController::class,'en'])->name('lang.en');

    Route::group(['middleware' => ['guest']], function() {

        /**
         * Login Routes
        */

        Route::get('/', [AuthController::class,'login'])->name('login');
        Route::post('/handel/login',[AuthController::class,'handel_login'])->name('login.handel');

    });

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
        */

        Route::get('/logout', [AuthController::class,'logout'])->name('logout');

        Route::post('/change-password', [AuthController::class,'change_password'])->name('change.password');

        
        Route::get('/app', [siteController::class,'board'])->name('app.board');

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);

        /**
         * user Routes
        */

        Route::group(['prefix' => 'users'], function() {
            Route::get('/', [UsersController::class,'index'])->name('users.index');
            Route::get('/create', [UsersController::class,'create'])->name('users.create');
            Route::post('/create', [UsersController::class,'store'])->name('users.store');
            Route::get('/{user}/show', [UsersController::class,'show'])->name('users.show');
            Route::get('/{user}/edit', [UsersController::class,'edit'])->name('users.edit');
            Route::patch('/{user}/update', [UsersController::class,'update'])->name('users.update');
            Route::delete('/{user}/delete', [UsersController::class,'destroy'])->name('users.destroy');
        });

        /**
         * user Routes
         */

        /**
         * stage Routes
        */

        Route::group(['prefix' => 'stages'], function() {
            Route::get('/', [ControllersStageController::class,'index'])->name('stages.index');
            Route::get('/create', [ControllersStageController::class,'create'])->name('stages.create');
            Route::post('/create', [ControllersStageController::class,'store'])->name('stages.store');
            Route::get('/{stage}/show', [ControllersStageController::class,'show'])->name('stages.show');
            Route::get('/{stage}/edit', [ControllersStageController::class,'edit'])->name('stages.edit');
            Route::patch('/{stage}/update', [ControllersStageController::class,'update'])->name('stages.update');
            Route::delete('/{stage}/delete', [ControllersStageController::class,'destroy'])->name('stages.destroy');
        });

        /**
         * stage Routes
         */

        /**
         * branch Routes
        */

        Route::group(['prefix' => 'branches'], function() {
            Route::get('/', [ControllersBranchController::class,'index'])->name('branches.index');
            Route::get('/create', [ControllersBranchController::class,'create'])->name('branches.create');
            Route::post('/create', [ControllersBranchController::class,'store'])->name('branches.store');
            Route::get('/{branch}/show', [ControllersBranchController::class,'show'])->name('branches.show');
            Route::get('/{branch}/edit', [ControllersBranchController::class,'edit'])->name('branches.edit');
            Route::patch('/{branch}/update', [ControllersBranchController::class,'update'])->name('branches.update');
            Route::delete('/{branch}/delete', [ControllersBranchController::class,'destroy'])->name('branches.destroy');
        });

        /**
         * branch Routes
        */

        /**
         * academicyear Routes
        */

        Route::group(['prefix' => 'academicyears'], function() {
            Route::get('/', [AcademicyearController::class,'index'])->name('academicyears.index');
            Route::get('/create', [AcademicyearController::class,'create'])->name('academicyears.create');
            Route::post('/create', [AcademicyearController::class,'store'])->name('academicyears.store');
            Route::get('/{academicyear}/show', [AcademicyearController::class,'show'])->name('academicyears.show');
            Route::get('/{academicyear}/edit', [AcademicyearController::class,'edit'])->name('academicyears.edit');
            Route::patch('/{academicyear}/update', [AcademicyearController::class,'update'])->name('academicyears.update');
            Route::delete('/{academicyear}/delete', [AcademicyearController::class,'destroy'])->name('academicyears.destroy');
        });

        /**
         * academicyear Routes
        */

        /**
         * student Routes
        */

        Route::group(['prefix' => 'students'], function() {
            Route::get('/', [ControllersStudentController::class,'index'])->name('students.index');
            Route::get('/create', [StudentControllerControllersStudentController::class,'create'])->name('students.create');
            Route::post('/create', [StudentControllerControllersStudentController::class,'store'])->name('students.store');
            Route::get('/{student}/show', [StudentControllerControllersStudentController::class,'show'])->name('students.show');
            Route::get('/{student}/edit', [StudentControllerControllersStudentController::class,'edit'])->name('students.edit');
            Route::patch('/{student}/update', [StudentControllerControllersStudentController::class,'update'])->name('students.update');
            Route::delete('/{student}/delete', [StudentControllerControllersStudentController::class,'destroy'])->name('students.destroy');
            Route::post('/import', [StudentControllerControllersStudentController::class,'import'])->name('students.import');
        });

        /**
         * student Routes
        */

        /**
         * student Routes
        */

        Route::group(['prefix' => 'responsibilities'], function() {
            Route::get('/', [ResponsibilityController::class,'index'])->name('responsibilities.index');
            Route::get('/create', [ResponsibilityController::class,'create'])->name('responsibilities.create');
            Route::post('/create', [ResponsibilityController::class,'store'])->name('responsibilities.store');
            Route::delete('/{user}/delete', [ResponsibilityController::class,'destroy'])->where('user','[0-9]+')->name('responsibilities.destroy');
        });

        /**
         * student Routes
        */

        /**
         * student Routes
        */

        Route::group(['prefix' => 'expenses'], function() {
            Route::get('/', [ControllersExpenseController::class,'index'])->name('expenses.index');
            Route::get('{expense}/edit', [ControllersExpenseController::class,'create'])->name('expenses.edit');
            Route::Post('/bus/expense', [ControllersExpenseController::class,'bus_expenses'])->name('expenses.bus');
            Route::post('{expense}/update', [ControllersExpenseController::class,'update'])->name('expenses.update');
            Route::post('{expense}/update/status', [ControllersExpenseController::class,'update_status'])->name('expenses.update.recipt');
        });

        /**
         * student Routes
        */

        /**
         * search Routes
        */

        Route::group(['prefix' => 'search'], function() {
            Route::get('/expense/filter', [ControllersExpenseController::class,'search'])->name('filter.expense');
        });

        /**
         * search Routes
        */

        Route::middleware('json')->group(function(){
            Route::get('get/{branch}/stage',[StageController::class,'get_branch_stage']);
            Route::get('get/branches',[BranchController::class,'index']);
            Route::get('get/years',[YearController::class,'get_all_years']);
            Route::get('get/students',[StudentController::class,'get_all_students']);
            Route::get('{expence}/show',[ExpenseController::class,'show']);
        });

    });


    
});

