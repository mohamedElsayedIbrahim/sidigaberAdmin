<?php

use App\Http\Controllers\AcademicyearController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\Api\BranchController as ApiBranchController;
use App\Http\Controllers\Api\ExpenseController as ApiExpenseController;
use App\Http\Controllers\Api\StageController as ApiStageController;
use App\Http\Controllers\Api\StudentController as ApiStudentController;
use App\Http\Controllers\Api\YearController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ResponsibilityController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\siteController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UsersController;
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
            Route::get('/{user}/reset-password', [UsersController::class,'resetpassword'])->name('users.resetpassword');
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
            Route::get('/', [StageController::class,'index'])->name('stages.index');
            Route::get('/create', [StageController::class,'create'])->name('stages.create');
            Route::post('/create', [StageController::class,'store'])->name('stages.store');
            Route::get('/{stage}/show', [StageController::class,'show'])->name('stages.show');
            Route::get('/{stage}/edit', [StageController::class,'edit'])->name('stages.edit');
            Route::patch('/{stage}/update', [StageController::class,'update'])->name('stages.update');
            Route::delete('/{stage}/delete', [StageController::class,'destroy'])->name('stages.destroy');
        });

        /**
         * stage Routes
         */

        /**
         * branch Routes
        */

        Route::group(['prefix' => 'branches'], function() {
            Route::get('/', [BranchController::class,'index'])->name('branches.index');
            Route::get('/create', [BranchController::class,'create'])->name('branches.create');
            Route::post('/create', [BranchController::class,'store'])->name('branches.store');
            Route::get('/{branch}/show', [BranchController::class,'show'])->name('branches.show');
            Route::get('/{branch}/edit', [BranchController::class,'edit'])->name('branches.edit');
            Route::patch('/{branch}/update', [BranchController::class,'update'])->name('branches.update');
            Route::delete('/{branch}/delete', [BranchController::class,'destroy'])->name('branches.destroy');
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
            Route::get('/', [StudentController::class,'index'])->name('students.index');
            Route::get('/create', [StudentController::class,'create'])->name('students.create');
            Route::post('/store', [StudentController::class,'store'])->name('students.store');
            Route::get('/{student}/show', [StudentController::class,'show'])->name('students.show');
            Route::get('/{student}/edit', [StudentController::class,'edit'])->name('students.edit');
            Route::patch('/{student}/update', [StudentController::class,'update'])->name('students.update');
            Route::delete('/{student}/delete', [StudentController::class,'destroy'])->name('students.destroy');
            Route::post('/import', [StudentController::class,'import'])->name('students.import');
            Route::get('/search', [StudentController::class,'search'])->name('students.search');
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
            Route::get('/', [ExpenseController::class,'index'])->name('expenses.index');
            Route::get('{expense}/edit', [ExpenseController::class,'create'])->name('expenses.edit');
            Route::Post('/bus/expense', [ExpenseController::class,'bus_expenses'])->name('expenses.bus');
            Route::Post('/school/expense', [ExpenseController::class,'school_expenses'])->name('expenses.school');
            Route::post('{expense}/update', [ExpenseController::class,'update'])->name('expenses.update');
            Route::get('{expense}/delete', [ExpenseController::class,'destroy'])->name('expenses.destroy');
            Route::post('{expense}/update/status', [ExpenseController::class,'update_status'])->name('expenses.update.recipt');
        });

        /**
         * student Routes
        */

        /**
         * search Routes
        */

        Route::group(['prefix' => 'search'], function() {
            Route::get('/expense/filter', [ExpenseController::class,'search'])->name('filter.expense');
        });

        /**
         * search Routes
        */

        /**
         * user Routes
        */

        Route::group(['prefix' => 'admissions'], function() {
            Route::get('/{id?}', [AdmissionController::class,'index'])->name('admission.index');
            Route::post('/download', [AdmissionController::class,'download'])->name('admission.download');
        });

        /**
         * user Routes
         */

        Route::middleware('json')->group(function(){
            Route::get('get/{branch}/stage',[ApiStageController::class,'get_branch_stage']);
            Route::get('get/branches',[ApiBranchController::class,'index']);
            Route::get('get/years',[YearController::class,'get_all_years']);
            Route::get('get/students',[ApiStudentController::class,'get_all_students']);
            Route::get('{expence}/show',[ApiExpenseController::class,'show']);
            Route::get('student/{id}/show',[AdmissionController::class,'student_info']);
        });

    });


    
});

