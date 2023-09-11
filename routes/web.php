<?php

use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\StudentController;
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
    Route::get('/ar', 'LangController@ar')->name('lang.ar');
    Route::get('/en', 'LangController@en')->name('lang.en');

    Route::group(['middleware' => ['guest']], function() {

        /**
         * Login Routes
        */

        Route::get('/', 'AuthController@login')->name('login');
        Route::post('/handel/login','AuthController@handel_login')->name('login.handel');

    });

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
        */

        Route::get('/logout', 'AuthController@logout')->name('logout');

        Route::post('/change-password', 'AuthController@change_password')->name('change.password');

        
        Route::get('/app', 'siteController@board')->name('app.board');

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);

        /**
         * user Routes
        */

        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        /**
         * user Routes
         */

        /**
         * stage Routes
        */

        Route::group(['prefix' => 'stages'], function() {
            Route::get('/', 'StageController@index')->name('stages.index');
            Route::get('/create', 'StageController@create')->name('stages.create');
            Route::post('/create', 'StageController@store')->name('stages.store');
            Route::get('/{stage}/show', 'StageController@show')->name('stages.show');
            Route::get('/{stage}/edit', 'StageController@edit')->name('stages.edit');
            Route::patch('/{stage}/update', 'StageController@update')->name('stages.update');
            Route::delete('/{stage}/delete', 'StageController@destroy')->name('stages.destroy');
        });

        /**
         * stage Routes
         */

        /**
         * branch Routes
        */

        Route::group(['prefix' => 'branches'], function() {
            Route::get('/', 'BranchController@index')->name('branches.index');
            Route::get('/create', 'BranchController@create')->name('branches.create');
            Route::post('/create', 'BranchController@store')->name('branches.store');
            Route::get('/{branch}/show', 'BranchController@show')->name('branches.show');
            Route::get('/{branch}/edit', 'BranchController@edit')->name('branches.edit');
            Route::patch('/{branch}/update', 'BranchController@update')->name('branches.update');
            Route::delete('/{branch}/delete', 'BranchController@destroy')->name('branches.destroy');
        });

        /**
         * branch Routes
        */

        /**
         * academicyear Routes
        */

        Route::group(['prefix' => 'academicyear'], function() {
            Route::get('/', 'AcademicyearController@index')->name('academicyears.index');
            Route::get('/create', 'AcademicyearController@create')->name('academicyears.create');
            Route::post('/create', 'AcademicyearController@store')->name('academicyears.store');
            Route::get('/{academicyear}/show', 'AcademicyearController@show')->name('academicyears.show');
            Route::get('/{academicyear}/edit', 'AcademicyearController@edit')->name('academicyears.edit');
            Route::patch('/{academicyear}/update', 'AcademicyearController@update')->name('academicyears.update');
            Route::delete('/{academicyear}/delete', 'AcademicyearController@destroy')->name('academicyears.destroy');
        });

        /**
         * academicyear Routes
        */

        /**
         * student Routes
        */

        Route::group(['prefix' => 'student'], function() {
            Route::get('/', 'StudentController@index')->name('students.index');
            Route::get('/create', 'StudentController@create')->name('students.create');
            Route::post('/create', 'StudentController@store')->name('students.store');
            Route::get('/{student}/show', 'StudentController@show')->name('students.show');
            Route::get('/{student}/edit', 'StudentController@edit')->name('students.edit');
            Route::patch('/{student}/update', 'StudentController@update')->name('students.update');
            Route::delete('/{student}/delete', 'StudentController@destroy')->name('students.destroy');
            Route::post('/import', 'StudentController@import')->name('students.import');
        });

        /**
         * student Routes
        */

        /**
         * student Routes
        */

        Route::group(['prefix' => 'responsibilities'], function() {
            Route::get('/', 'ResponsibilityController@index')->name('responsibilities.index');
            Route::get('/create', 'ResponsibilityController@create')->name('responsibilities.create');
            Route::post('/create', 'ResponsibilityController@store')->name('responsibilities.store');
            Route::delete('/{user}/delete', 'ResponsibilityController@destroy')->where('user','[0-9]+')->name('responsibilities.destroy');
        });

        /**
         * student Routes
        */

        /**
         * student Routes
        */

        Route::group(['prefix' => 'expenses'], function() {
            Route::get('/', 'ExpenseController@index')->name('expenses.index');
            Route::get('{expense}/edit', 'ExpenseController@create')->name('expenses.edit');
            Route::post('{expense}/update', 'ExpenseController@update')->name('expenses.update');
            Route::post('{expense}/update/status', 'ExpenseController@update_status')->name('expenses.update.recipt');
        });

        /**
         * student Routes
        */

        Route::middleware('json')->group(function(){
            Route::get('get/{branch}/stage',[StageController::class,'get_branch_stage']);
            Route::get('get/branches',[BranchController::class,'index']);
            Route::get('{expence}/show',[ExpenseController::class,'show']);
        });

    });


    
});

