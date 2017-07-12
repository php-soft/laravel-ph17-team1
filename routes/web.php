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

    Route::get('/orders/statistic', 'OrderController@getStatistic')->name('statistic');

    Route::get('/orders/statistic/detail', 'OrderController@getStatisticDetail')->name('statistic');

    Route::get('reviews', 'ReviewController@index');
    Route::get('reviews/delete/{id}', 'ReviewController@destroy');

    Route::get('votes', 'VoteController@index');
    Route::get('votes/delete/{id}', 'VoteController@destroy');

    Route::get('products', 'ProductController@index');
    Route::post('products/new', 'ProductController@new');
    Route::get('products/edit/{id}', 'ProductController@edit');
    Route::post('products/update/{id}', 'ProductController@update');
    Route::get('products/delete/{id}', 'ProductController@destroy');
});

Route::get('introduce', 'IntroduceController@index');
Route::get('warranty', 'WarrantyController@index');
Route::get('installment', 'InstallmentController@index');
Route::get('regulation', 'RegulationController@index');

Route::get('news', 'NewsController@index');
Route::post('news/load', 'NewsController@load');
Route::post('news/comment/{id}', 'NewsCommentController@store')->middleware('auth');
Route::post('news/comment/delete/{id}', 'NewsCommentController@destroy')->middleware('auth');
Route::post('news/comment/load/{id}', 'NewsCommentController@load');
Route::post('news/reply/{id}', 'ReplyController@store')->middleware('auth');
Route::post('news/reply/delete/{id}', 'ReplyController@destroy')->middleware('auth');

Route::post('news/like/{id}', 'NewsCommentController@like');
Route::post('news/dislike/{id}', 'NewsCommentController@dislike');

Route::get('news/{slug}', 'NewsController@detail');
Route::get('news/tag/{id}', 'NewsController@indexByTag');
Route::get('news/listnew/{slug}', 'NewsController@indexByListNew');

Route::get('products', 'ProductController@index');
Route::get('products/{slug}', 'ProductController@indexByID');
Route::post('products/{slug}/create-vote', 'ProductController@storeVote');
Route::post('products/{slug}/create-review', 'ProductController@storeComment');

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

Route::get('products/compare/{slug}VS{slugsame}', 'ProductController@compare');
Route::get('products/dtdd/search', 'ProductController@search')->name('search');
Route::get('products/dtdd/{name}', 'ProductController@indexByName');
Route::get('products/dtdd/gia/duoi1trieu', 'ProductController@indexByPriceDown1M')
->name('duoi1trieu');
Route::get('products/dtdd/gia/tu1den3trieu', 'ProductController@indexByPrice1to3M')
->name('tu1den3trieu');
Route::get('products/dtdd/gia/tu3den7trieu', 'ProductController@indexByPrice3to7M')
->name('tu3den7trieu');
Route::get('products/dtdd/gia/tu7den10trieu', 'ProductController@indexByPrice7to10M')
->name('tu7den10trieu');
Route::get('products/dtdd/gia/tu10den15trieu', 'ProductController@indexByPrice10to15M')
->name('tu10den15trieu');
Route::get('products/dtdd/gia/tren15trieu', 'ProductController@indexByPriceUp15M')
->name('tren15trieu');
Route::get('products/dtdd/loai/smart-phone', 'ProductController@indexBySmartPhone')
->name('smartphone');
Route::get('products/dtdd/loai/classic-phone', 'ProductController@indexByClassicPhone')
->name('classicphone');
Route::get('products/dtdd/loai/android', 'ProductController@indexByAndroid')->name('android');
Route::get('products/dtdd/loai/ios', 'ProductController@indexByIOS')->name('ios');
Route::get('products/dtdd/camera/duoi3MP', 'ProductController@indexByCameraDown3MP')
->name('duoi3MP');
Route::get('products/dtdd/camera/tu3den5MP', 'ProductController@indexByCamera3to5MP')
->name('tu3den5MP');
Route::get('products/dtdd/camera/tu5den8MP', 'ProductController@indexByCamera5to8MP')
->name('tu5den8MP');
Route::get('products/dtdd/camera/tu8den12MP', 'ProductController@indexByCamera8to12MP')
->name('tu8den12MP');
Route::get('products/dtdd/camera/tren12MP', 'ProductController@indexByCameraUp12MP')->name('tren12MP');
Route::get('products/dtdd/chatlieu/kimloainguyenkhoi', 'ProductController@indexByDesignUnibodyMetal')
->name('kimloainguyenkhoi');
Route::get('products/dtdd/chatlieu/nhuavakimloai', 'ProductController@indexByDesignPlasticMetal')
->name('nhuavakimloai');
Route::get('products/dtdd/chatlieu/kimloaivakinhcuongluc', 'ProductController@indexByDesignMetalGlass')
->name('kimloaivakinhcuongluc');
Route::get('products/dtdd/chatlieu/nhua', 'ProductController@indexByDesignPlastic')->name('nhua');
Route::get('products/dtdd/baomat/vantay', 'ProductController@indexBySecurityFinger')->name('vantay');
Route::get('products/dtdd/baomat/chongnuocbui', 'ProductController@indexByWaterDustProof')->name('chongbuinuoc');
Route::get('products/dtdd/baomat/2sim', 'ProductController@indexByDoubleSim')->name('2sim');
Route::get('products/dtdd/baomat/3dtouch', 'ProductController@indexBy3DTouch')->name('3dtouch');
Route::get('products/dtdd/baomat/pinkhung', 'ProductController@indexByBatteryMax')->name('pinkhung');
