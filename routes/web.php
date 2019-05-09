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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() { 
    Route::resources([
        'entrepreneur' => 'EntrepreneurController',
    ]);
    Route::get('/offer/{id}/investor','OfferController@Investor');
    Route::get('/offer/{id}/entrepreneur','OfferController@Entrepreneur');
    Route::post('/offer/store','OfferController@store')->name('offer.store');
    Route::get('/offer', 'OfferController@index')->name('offer.index');
    Route::get('/offer/{id}', 'OfferController@show')->name('offer.detail');
});
