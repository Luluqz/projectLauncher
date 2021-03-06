<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::auth();
Route::get('/home/account', 'HomeController@account')->name('account');
Route::post('/home/modifAccount', 'HomeController@modifAccount');
Route::post('/home/modifProject', 'HomeController@modifProject')->name('modifProject');
Route::post('/home/modifTop', 'HomeController@modifTop')->name('modifTop');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::resource('/home', 'HomeController');

Route::get('/home/project/{project_id}','ProjectDetailsController@index')->name('projectdetails');
Route::post('/home/addContract', 'ProjectDetailsController@addContract')->name('addContract');

Route::post('/home/create/addProject', 'CreateController@addProject');
Route::get('/home/create', 'CreateController@index');

Route::get('/home/category/{category_id}', 'HomeController@category')->name('category');

Route::resource('/home/queries', 'HomeController@queries');

