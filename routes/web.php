<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/view_reports', 'HomeController@view_reports');
Route::get('/new_report', 'HomeController@new_report');

Auth::routes();

Route::post('/add_report', 'HomeController@add_report');
Route::post('/filter_report', 'HomeController@filter_report');
Route::post('/edit_report', 'HomeController@edit_report');
