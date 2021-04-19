<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('drug', 'DrugController');
    Route::resource('supply', 'SupplyController');
    Route::get('/customer/buy', 'BuyDrugController@buy')->name('customer.buy');
    Route::get('/customer/{id}/payment', 'BuyDrugController@payment')->name('customer.payment');
    Route::patch('/customer/{id}/pay', 'BuyDrugController@pay')->name('customer.pay');
});
