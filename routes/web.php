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
Route::get('/home', 'HomeController@index');

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

Route::get('news', 'NewsController@index');
Route::get('news/{slug}', 'NewsController@detail');
Route::get('news/tag/{id}', 'NewsController@indexByTag');
Route::post('news/comment/{id}', 'NewsCommentController@store')->middleware('auth');
Route::post('news/reply/{id}', 'ReplyController@store')->middleware('auth');

Route::get('products', 'HomeController@index');

Route::get('products/{slug}', 'ProductController@indexByID');

Route::post('products/{slug}/create-vote', 'ProductController@storeVote');

Route::post('products/{slug}/create-review', 'ProductController@storeComment');

Route::get('/products/compare/{slug}VS{slugsame}', 'ProductController@compare');
