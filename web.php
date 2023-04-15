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

Route::get('/', 'HomeController@index')->name('home');





Route::get('/fraude', 'FraudeController@index');
Route::get('/surveillance', 'SurveillanceController@index');
Route::get('/surveillance/repartition', 'SurveillanceController@repartition');



Route::get('/fraude', 'FraudeController@search');
Route::get('/fraude_show_dossier/{apoge}/{num_dossier}', 'FraudeController@show_dossier_data');
Route::get('/fraude_list/{year}/{exame}/{conv}', 'FraudeController@list');
Route::post('/fraude_list', 'FraudeController@list_filter');
Route::post('/fraude/save', 'FraudeController@save');
Route::get('/fraude/dossier_num/{num}/{st}', 'FraudeController@get_dossier_fraude_by_num');

Route::get('/fraude/delete_img/{id_doss}/{img_name}', 'FraudeController@dossier_fraude_delete_img');













Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});
