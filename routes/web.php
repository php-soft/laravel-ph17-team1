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

    Route::get('/orders', 'OrderController@index')->name('adminOrders');

    Route::get('/orders/get_datatable', 'OrderController@get_datatable')->name('adminOrders');
    
    Route::get('/orders/edit/{order_id}', 'OrderController@edit')->name('adminEditOrder');
    
    Route::put('/orders/edit/{order_id}', 'OrderController@update')->name('adminUpdateOrder');

    Route::put('/orders/update/{id}', 'OrderController@updateindex')->name('adminUpdateOrderIndex');
    
    Route::get('/orders/delete/{order_id}', 'OrderController@destroy')->name('adminDeleteOrder');

    Route::get('/orders/viewdetail/{order_id}', 'OrderController@viewDetail')->name('adminViewOrderDetail');
});

Route::get('news', 'NewsController@index');
Route::get('news/{slug}', 'NewsController@detail');
Route::get('news/tag/{id}', 'NewsController@indexByTag');
Route::post('news/comment/{id}', 'NewsCommentController@store')->middleware('auth');
Route::post('news/reply/{id}', 'ReplyController@store')->middleware('auth');

Route::get('products', 'HomeController@index');

Route::get('products/{slug}', 'ProductController@indexByID');

Route::post('/vote/create', 'ProductController@storeVote');

Route::post('/review/create', 'ProductController@storeComment');

Route::get('/products/compare/{slug}VS{slugsame}', 'ProductController@compare')->name('ss');

Route::get('/gio-hang', 'CartController@index')->name('show-cart');

Route::get('/them-gio-hang/{product_id}', 'CartController@getAddToCart')->name('add-to-cart');

Route::get('check-out', ['uses'=>'CartController@getCheckout', 'as'=>'checkout']);

Route::put('/gio-hang/cap-nhat-sp/{product_id}', 'CartController@getUpdateCart')->name('update-cart');

Route::get('/gio-hang/cap-nhat/{product_id}', 'CartController@getUpdateQtyCart')->name('update-qty-cart');

Route::get('/gio-hang/xoa-cap-nhat/{product_id}', 'CartController@getDeleteQtyCart')->name('delete-qty-cart');

Route::get('/gio-hang/xoa-san-pham/{product_id}', 'CartController@getDeleteProductCart')->name('delete-product-cart');

Route::get('/gio-hang/xoa-gio-hang', 'CartController@getDeleteCart')->name('delete-cart');

Route::get('/dat-hang', 'OrderController@showOrder')->name('dat-hang');

Route::post('/don-dat-hang', 'OrderController@storeOrder')->name('don-dat-hang');

Route::get('/xac-nhan-dat-hang/{id}', 'OrderController@submitOrder')->name('xac-nhan-dat-hang');

Route::get('/tim-kiem-hoa-don','OrderController@showSearchOrder')->name('show-tim-kiem-don-hang');

Route::post('/tim-kiem-hoa-don','OrderController@searchOrder')->name('tim-kiem-don-hang');

Route::get('/quan-ly-don-hang','OrderController@orderByCustomerId')->name('quan-ly-don-hang');

Route::get('/chi-tiet-don-hang/{id}','OrderController@viewDetailOrder')->name('chi-tiet-don-hang');
