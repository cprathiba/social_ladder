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

Route::get('/admin/product/view', 'ProductController@index');

Route::get('/admin/product/create', 'ProductController@create');

Route::post('/admin/product/save', 'ProductController@save');

Route::get('/admin/product/edit/{id}', 'ProductController@editView');

Route::post('/admin/product/update/{id}', 'ProductController@update');