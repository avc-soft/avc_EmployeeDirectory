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

Route::resource('employees', 'EmployeeController');

Route::get('/tree/root', 'TreeController@treeRoot');
Route::get('/tree/{employee}/children', 'TreeController@treeChildren');

