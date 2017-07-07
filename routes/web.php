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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('demo');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('news', 'NewsController@index');
    Route::get('news/create', 'NewsController@create');
    Route::post('news', 'NewsController@store');
    Route::get('news/edit/{id}', 'NewsController@edit');
    Route::post('news/edit/{id}', 'NewsController@update');
    Route::get('news/delete/{id}', 'NewsController@destroy');

    Route::get('tags', 'TagController@index');
    Route::get('tags/create', 'TagController@create');
    Route::post('tags', 'TagController@store');
    Route::get('tags/edit/{id}', 'TagController@edit');
    Route::post('tags/edit/{id}', 'TagController@update');
    Route::get('tags/delete/{id}', 'TagController@destroy');
});

Route::get('introduce', 'IntroduceController@index');
Route::get('warranty', 'WarrantyController@index');
Route::get('installment', 'InstallmentController@index');
Route::get('regulation', 'RegulationController@index');
