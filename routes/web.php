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

Route::get('/', 'PlotTractorController@index')->name('home');

Auth::routes();

Route::get('plots', 'PlotController@index')->name('plots.index');
Route::get('plots/create', 'PlotController@create')->name('plots.create');
Route::post('plots', 'PlotController@store')->name('plots.store');

Route::get('tractors', 'TractorController@index')->name('tractors.index');
Route::get('tractors/create', 'TractorController@create')->name('tractors.create');
Route::post('tractors', 'TractorController@store')->name('tractors.store');

Route::resource('plot-tractor', 'PlotTractorController', ['except' => 'show']);
