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

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('checkLogin');

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('login', 'AccountController@login')->middleware('checkLogout');
Route::post('login', 'AccountController@checkLogin');
Route::get('logout', 'AccountController@logout');

Route::prefix('users')->name('users')->middleware('checkLogin')->group(function () {
    Route::get('index', 'UserController@index')->name('.index');
    Route::get('create', 'UserController@create');
    Route::post('create', 'UserController@store');
    Route::get('show/{id}', 'UserController@show');
    Route::get('edit/{id}', 'UserController@edit');
    Route::post('update', 'UserController@update');
    Route::get('delete/{id}', 'UserController@destroy');
});

Route::prefix('saleorders')->name('saleorders')->middleware('checkLogin')->group(function () {
    Route::get('index', 'SaleOrderController@index')->name('.index');
    Route::get('create', 'SaleOrderController@create');
    Route::post('create', 'SaleOrderController@store');
    Route::get('update/{id}', 'SaleOrderController@edit');
    Route::post('update/{id}', 'SaleOrderController@update');
    Route::get('delete/{id}', 'SaleOrderController@destroy');
});

Route::prefix('customers')->name('customers')->middleware('checkLogin')->group(function () {
    Route::get('index', 'CustomersController@index')->name('.index');
    Route::get('create', 'CustomersController@create');
    Route::post('create', 'CustomersController@store');
    Route::get('update/{id}', 'CustomersController@edit');
    Route::post('update/{id}', 'CustomersController@update');
    Route::get('delete/{id}', 'CustomersController@destroy');
});

Route::get('/index', 'TemplateController@index');
Route::get('/index2', 'TemplateController@index2');
Route::get('/create', 'TemplateController@create');
Route::get('/create2', 'TemplateController@create2');
Route::get('/show', 'TemplateController@show');
