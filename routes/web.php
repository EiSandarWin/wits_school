<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\M_templatesController;
use App\Http\Controllers\M_template_detailsController;
use App\Http\Controllers\M_branchController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('m_template_details','M_template_detailsController');
    Route::resource('m_templates','M_templatesController');
    Route::resource('m_branch','M_branchController');
});
