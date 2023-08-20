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
         * stage Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{stage}/show', 'UsersController@show')->name('users.show');
            Route::get('/{stage}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{stage}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{stage}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        /**
         * stage Routes
         */

         /**
         * stage Routes
         */
        Route::group(['prefix' => 'stage'], function() {
            Route::get('/', 'StageController@index')->name('stage.index');
            Route::get('/create', 'StageController@create')->name('stage.create');
            Route::post('/create', 'StageController@store')->name('stage.store');
            Route::get('/{stage}/show', 'StageController@show')->name('stage.show');
            Route::get('/{stage}/edit', 'StageController@edit')->name('stage.edit');
            Route::patch('/{stage}/update', 'StageController@update')->name('stage.update');
            Route::delete('/{stage}/delete', 'StageController@destroy')->name('stage.destroy');
        });

        /**
         * stage Routes
         */

    });
});

