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
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Route resource users
Route::resource('users', 'UserController')->middleware(['auth', 'admin']);

// Route task

Route::prefix('/task')->name('task.')->group(function () {
    Route::get('/{user}', 'TaskController@index')->name('index');
    Route::get('create/{user}', 'TaskController@create')->name('create');
    Route::post('/{user}', 'TaskController@store')->name('store');
    Route::get('{task}/{user}', 'TaskController@show')->name('show');
    Route::get('{task}/{user}/edit', 'TaskController@edit')->name('edit');
    Route::put('{task}/{user}', 'TaskController@update')->name('update');
    Route::delete('{task}/{user}', 'TaskController@destroy')->name('destroy');
});

// Route language
Route::get('lang/{lang}', 'LanguageController@changeLanguage')->name('language');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
