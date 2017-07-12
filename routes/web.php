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

    Route::get('/orders/get_datatable', 'OrderController@getDatatable')->name('getdatatable');
    
    Route::get('/orders/edit/{order_id}', 'OrderController@edit')->name('adminEditOrder');
    
    Route::put('/orders/edit/{order_id}', 'OrderController@update')->name('adminUpdateOrder');

    Route::put('/orders/update/{id}', 'OrderController@updateindex')->name('adminUpdateOrderIndex');

    Route::get('/orders/deleteRecord/{id}', 'OrderController@deleteRecord')->name('deleteRecord');

    Route::get('/orders/restoreRecord/{id}', 'OrderController@restoreRecord')->name('restoreRecord');

    Route::get('/orders/detail/{id}', 'OrderController@getOrderDetail')->name('adminGetOrderDetail');

    Route::get('/orders/edit/order/{id}', 'OrderController@getDetailOfOrder')->name('adminGetDetailOfOrder');

    Route::get('/orders/group/{id}', 'OrderController@getGroupOrder')->name('getGroupOrder');
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

Route::get('/products/compare/{slug}VS{slugsame}', 'ProductController@compare')->name('ss');

Route::get('/gio-hang', 'CartController@index')->name('show-cart');

Route::get('/them-gio-hang/{product_id}', 'CartController@getAddToCart')->name('add-to-cart');

Route::get('check-out', ['uses'=>'CartController@getCheckout', 'as'=>'checkout']);

Route::get('/gio-hang/cap-nhat', 'CartController@cartUpdate')->name('update-cart-test');


Route::get('/gio-hang/xoa-san-pham/{product_id}', 'CartController@getDeleteProductCart')->name('delete-product-cart');

Route::get('/gio-hang/xoa-gio-hang', 'CartController@getDeleteCart')->name('delete-cart');

Route::get('/dat-hang', 'OrderController@showOrder')->name('dat-hang');

Route::get('/dat-hang/group-store', 'OrderController@groupStore')->name('groupstore');

Route::post('/don-dat-hang', 'OrderController@storeOrder')->name('don-dat-hang');

Route::get('/xac-nhan-dat-hang/{id}', 'OrderController@submitOrder')->name('xac-nhan-dat-hang');

Route::get('/tim-kiem-hoa-don', 'OrderController@showSearchOrder')->name('show-tim-kiem-don-hang');

Route::post('/tim-kiem-hoa-don', 'OrderController@searchOrder')->name('tim-kiem-don-hang');

Route::get('/quan-ly-don-hang', 'OrderController@orderByCustomerId')->name('quan-ly-don-hang');

Route::get('/quan-ly-don-hang/chi-tiet/{id}', 'OrderController@getDetail')->name('getDetail');

Route::get('/chi-tiet-don-hang/{id}', 'OrderController@viewDetailOrder')->name('chi-tiet-don-hang');
