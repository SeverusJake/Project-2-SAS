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
Route::get('/users/index','UserController@index')->name('users.index');
Route::get('/users/create','UserController@create');
Route::post('/users/create','UserController@store');
Route::get('/users/delete/{id}','UserController@destroy');

Route::get('/saleorders/index','SaleOrderController@index')->name('saleorders.index');
Route::get('/saleorders/create','SaleOrderController@create');
Route::post('/saleorders/create','SaleOrderController@store');
Route::get('/saleorders/delete/{id}','SaleOrderController@destroy');

Route::get('customers/index', 'CustomersController@listCustomer')->name('customers.index');
Route::post('customers/index','CustomersController@searchCustomer');
Route::get('customers/create','CustomersController@addCustomer');
Route::post('customers/create','CustomersController@createCustomer');
Route::get('customers/update/{id}','CustomersController@update');
Route::post('customers/update/{id}','CustomersController@postupdate');
Route::get('customers/delete/{id}', 'CustomersController@delete');
