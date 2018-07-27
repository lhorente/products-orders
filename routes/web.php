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

Route::get('/', function () {
    return view('welcome');
});

$this->get('products', 'ProductsController@index');
$this->get('products/create', 'ProductsController@create');
$this->get('products/edit/{id}', 'ProductsController@edit');
$this->get('products/remove/{id}', 'ProductsController@remove');

$this->post('products', 'ProductsController@save');