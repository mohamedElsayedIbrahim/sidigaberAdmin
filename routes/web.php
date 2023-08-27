<?php

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

        
        Route::get('/app', 'siteController@board')->name('app.board');

        
        Route::get('/student','StudentController@info')->name('app.student.info');

        Route::get('/student/bank','StudentController@index')->name('app.student');
        Route::get('/student/bus','StudentController@bus')->name('app.student.bus');

        Route::get('/student/edit/{id}','StudentController@edit')->name('app.student.edit');
        Route::post('/student/update/{id}','StudentController@update')->name('app.student.update');

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

    });
});

