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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});
// Route resource users
Route::resource('users', 'UserController');

// Route task

Route::prefix('/task')->name('task.')->group(function () {
    Route::get('/', 'TaskController@index')->name('index');
    Route::get('create', 'TaskController@create')->name('create');
    Route::post('/', 'TaskController@store')->name('store');
    Route::get('{task}', 'TaskController@show')->name('show');
    Route::get('{task}/edit', 'TaskController@edit')->name('edit');
    Route::put('{task}', 'TaskController@update')->name('update');
    Route::delete('{task}', 'TaskController@destroy')->name('destroy');
});
