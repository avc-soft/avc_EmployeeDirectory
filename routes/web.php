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

Auth::routes();

Route::get('/', function () {
    return view('employees.tree');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/grid', function () {
        return view('employees.grid');
    })->name('grid');
});

Route::get('/employees', 'EmployeeController@index');
Route::get('/employees/root', 'EmployeeController@treeRoot');
Route::get('/employee/{employee}/children', 'EmployeeController@treeChildren');

Route::get('/employees/sort/{field}', 'EmployeeController@sort');
Route::get('/employees/search/{value}', 'EmployeeController@search');
