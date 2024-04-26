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

// customer
Route::get('/', 'Customer\PageController@login');
Route::get('/customer', 'Customer\PageController@login');
Route::post('/customer/login','Customer\AuthController@login');
Route::post('/customer/signup','Customer\AuthController@signup');
Route::get('/customer/dashboard','Customer\PageController@index');
Route::post('/customer/add-post','Customer\PageController@addPost');

// admin
Route::get('/admin', 'Admin\PageController@login');
Route::post('/admin/login','Admin\AuthController@login');
Route::post('/admin/signup','Admin\AuthController@signup');
Route::get('/admin/dashboard','Admin\PageController@index');


