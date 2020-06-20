<?php

use Illuminate\Support\Facades\Route;
use App\NavBar;

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


Route::group(['prefix' =>'admin'],function(){
    Route::get('/','HomeController@myadmin');
    Route::get('/makeMenu','MyController@makeMenu');
    Route::post('/makeMenu/save','MyController@makeMenu');
});

Route::get('/','MyController@index');
Route::get('/election','MyController@election');
Route::get('/education','MyController@education');
Route::get('/news','MyController@news');
Route::get('/around','MyController@around');
Route::get('/page2','MyController@page');



Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');




