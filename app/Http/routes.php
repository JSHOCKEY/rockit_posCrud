<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');


Route::get('home', function() {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| Global path parameter constraints
|--------------------------------------------------------------------------
*/
Route::pattern('id', '[0-9]+');

Route::get('/', function() {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/
Route::get('item', 'ItemController@showAll');
Route::get('item/new', 'ItemController@create');
Route::post('item/new', 'ItemController@postCreate');
Route::get('item/{id}', 'ItemController@show');
Route::get('item/{id}/edit', 'ItemController@edit');
Route::post('item/{id}/edit', 'ItemController@postEdit');
Route::get('item/{id}/delete', 'ItemController@delete');


/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/
Route::get('customer', 'CustomerController@showAll');
Route::get('customer/new', 'CustomerController@create');
Route::post('customer/new', 'CustomerController@postCreate');
Route::get('customer/{id}', 'CustomerController@show');
Route::get('customer/{id}/edit', 'CustomerController@edit');
Route::post('customer/{id}/edit', 'CustomerController@postEdit');
Route::get('customer/{id}/delete', 'CustomerController@delete');
Route::get('customer/{id}/invoices', 'CustomerController@showCustomerInvoices');

Route::get('customer/{id}/invoices/new', 'CustomerController@createNewInvoiceForCustomer');


/*
|--------------------------------------------------------------------------
| Invoice Routes
|--------------------------------------------------------------------------
*/
Route::get('invoice', 'InvoiceController@showAll');
Route::get('invoice/{id}', 'InvoiceController@show');
Route::post('invoice/{id}/addItem', 'InvoiceController@addItemToInvoice');
Route::get('invoice/{invoiceid}/deleteItem/{itemid}', 'InvoiceController@deleteItemFromInvoice');