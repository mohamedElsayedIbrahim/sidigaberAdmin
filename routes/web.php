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


Route::get('/', 'AuthController@login')->name('home');
Route::post('/handel/login','AuthController@handel_login')->name('login.handel');

Route::get('/ar', 'LangController@ar')->name('lang.ar');
Route::get('/en', 'LangController@en')->name('lang.en');


Route::middleware('is.login')->group(function(){
    /*
    users links
    */
    Route::get('/logout', 'AuthController@logout')->name('logout');
    /*
    app board links
    */
    Route::get('/app', 'siteController@board')->name('app.board');

    Route::get('/student','StudentController@index')->name('app.student');
});


});
