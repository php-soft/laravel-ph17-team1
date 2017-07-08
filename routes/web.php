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

Route::get('news', 'NewsController@index');
Route::get('news/{slug}', 'NewsController@detail');
Route::get('news/tag/{id}', 'NewsController@indexByTag');
Route::post('news/comment/{id}', 'NewsCommentController@store')->middleware('auth');
Route::post('news/reply/{id}', 'ReplyController@store')->middleware('auth');

/*Route Product*/
Route::get('products', 'ProductController@index');
Route::get('products/{slug}', 'ProductController@indexByID');
Route::post('products/{slug}/create-vote', 'ProductController@storeVote');
Route::post('products/{slug}/create-review', 'ProductController@storeComment');
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
Route::get('products/dtdd/baomat/2sim', 'ProductController@DoubleSim')->name('2sim');
Route::get('products/dtdd/baomat/3dtouch', 'ProductController@indexBy3DTouch')->name('3dtouch');
Route::get('products/dtdd/baomat/pinkhung', 'ProductController@indexByBatteryMax')->name('pinkhung');
