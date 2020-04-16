<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
});

// PERSONS
Route::get('/people', 'PersonController@index');
Route::get('/people/create', 'PersonController@create');
Route::post('/people', 'PersonController@store');
Route::get('/people/{id}', 'PersonController@show');
Route::get('/people/{person}/edit', 'PersonController@edit');
Route::patch('/people/{person}',['as' => 'people.update', 'uses' => 'PersonController@update']);

//EMPLOYMENT
// Route::get('/employees-profile', 'EmployeeProfileController@index');

//DEPARTMENT & POSITION

//department
Route::get('/employee-profiles/department-position', 'DepartmentController@index');
Route::post('/employee-profiles/department-position/department', 'DepartmentController@store');

//position
Route::post('/employee-profiles/department-position/position', 'PositionController@store');
Route::patch('/employee-profiles/department-position/position/{position}', 'PositionController@update');

//POSITION


// //POSITION LEVEL
// Route::get('/employee-profiles/position-levels', 'PositionLevelController@index');
// Route::post('/employee-profiles/position-levels', 'PositionLevelController@store');


