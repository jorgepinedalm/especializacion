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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/residentes', 'ResidenteController@index')->name('residente.index');
Route::get('/residentes/new', 'ResidenteController@newResidente')->name('residente.new');
Route::post('/residentes/save', 'ResidenteController@saveResidente')->name('residente.save');
Route::get('/residentes/edit/{id}', 'ResidenteController@editResidente')->name('residente.edit');
Route::post('/residentes/update', 'ResidenteController@updateResidente')->name('residente.update');
Route::post('/residentes/delete', 'ResidenteController@deleteResidente')->name('residente.delete');
