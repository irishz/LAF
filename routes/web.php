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
Route::get('/result', function () {
    return view('result');
});

Auth::routes();

//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/home', 'HomeController@show');
    Route::get('/form', 'FormController@index');
    Route::post('/form', 'FormController@store');
    Route::patch('/form/{id}', 'FormController@update');
});

//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/form/{id}/edit', 'FormController@edit');
        Route::get('/dashboard', 'admin\AdminController@index');
    });
});

Route::get('/approve/{form_id}/{user_dept}', 'MailController@SendApprove');
Route::get('/not-approve/{form_id}/{user_dept}', 'MailController@SendNotApprove');
Route::get('/approve-mng/{form_id}', 'MailController@SendMngApprove');
Route::get('/not-approve-mng/{form_id}', 'MailController@SendMngNotApprove');