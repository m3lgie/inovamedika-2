<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/




Auth::routes();

Route::resource('products', 'ProductsController');
Route::resource('product_unit', 'ProductUnitController');
Route::resource('transactions', 'TransactionsController');
Route::resource('draft_transactions', 'DraftTransactionsController');
Route::resource('draft_transaction_details', 'DraftTransactionDetailsController');
Route::resource('users', 'UsersController');

Route::get('/profile/{id}', 'UsersController@showdetail')->name('user.showdetail');
Route::patch('/profile/{id}/update', 'UsersController@update_profile')->name('users.update_profile');


Route::get('/products/{id}', 'ProductsController@showdetail')->name('products.find');
Route::get('/','DasboardController@index');
Route::get('/search','ProductsController@search');
Route::post('/transactions/add_item/{id}','DraftTransactionsController@add_item')->name('draft_transactions.add_item');
Route::post('/draft_transaction_details/update/}','DraftTransactionDetailsController@update_item')->name('draft_transaction_details.update_item');
Route::post('/transactions/save/{id}','TransactionsController@save')->name('transactions.save');
Route::get('/transactions/edit/{id}','TransactionsController@edit')->name('transactions.edit');
Route::get('/transactions/print/{id}','TransactionsController@print')->name('transactions.print');
Route::get('/draft_transactions/delete/{id}','DraftTransactionsController@delete_item')->name('draft_transactions.delete_item');

Route::get('/report','ReportController@index')->name('report');
Route::post('/report/find','ReportController@find')->name('report.find');
