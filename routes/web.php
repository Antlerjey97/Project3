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

use App\product;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/dangnhap', 'Api\userController@getdangnhapadmin');
Route::post('/admin/dangnhap', 'Api\userController@postdangnhapadmin');
Route::get('/admin/logout', 'Api\userController@dangxuat');


Route::get('thu', function () {
    $product = product::find(1);
    foreach ($product->comment as $comment) {
        echo $comment->content . "<br>";

        $comt = DB::table('comment')
            ->join('products', 'product_id', '=', 'comment.id')
            ->where('product_id', '=', $product)
            ->select('comment.content', 'comment.id', 'comment.status', 'comment.time_created')
            ->get();

        echo $comt;
    }


});
Route::get('test', function () {
    return view('admin.layout.index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'banner'], function () {
        route::get('list', 'Api\bannerController@index');
        route::get('edit/{id}', 'Api\bannerController@getedit');
        route::post('edit/{id}', 'Api\bannerController@update');
        route::get('add', 'Api\bannerController@add');
        route::post('add', 'Api\bannerController@store');
        route::get('delete/{id}', 'Api\bannerController@destroy');
    });
    Route::group(['prefix' => 'category'], function () {
        route::get('list', 'Api\categoryController@index');
        route::get('delete/{id}', 'Api\categoryController@destroy');
        route::get('add', 'Api\categoryController@add');
        route::post('add', 'Api\categoryController@store');
        route::get('edit/{id}', 'Api\categoryController@getedit');
        route::post('edit/{id}', 'Api\categoryController@update');
    });
    Route::group(['prefix' => 'Product'], function () {
        route::get('list', 'Api\ProductController@index');
        route::get('edit/{id}', 'Api\ProductController@getedit');
        route::post('edit/{id}', 'Api\ProductController@update');
        route::get('delete/{id}', 'Api\productController@destroy');
        route::get('add', 'Api\productController@add');
        route::post('add', 'Api\productController@store');
    });
    Route::group(['prefix' => 'order'], function () {
        route::get('list', 'Api\orderController@index');
        route::get('detail/{id}', 'Api\orderController@show');
        route::get('edit', 'bannerController@getedit');
        route::get('delete', 'bannerController@getxoa');
        route::get('add', 'bannerController@getthem');
    });
    Route::group(['prefix' => 'inforcompany'], function () {
        route::get('list', 'Api\inforcompanyController@index');
        route::get('edit', 'Api\inforcompanyController@edit');
        route::get('add', 'Api\inforcompanyController@getthem');
    });
    Route::group(['prefix' => 'promotion'], function () {
        route::get('list', 'Api\promotionController@index');
        route::get('edit/{id}', 'Api\promotionController@getedit');
        route::post('edit/{id}', 'Api\promotionController@update');
        route::get('delete/{id}', 'Api\promotionController@destroy');
        route::get('add', 'Api\promotionController@add');
        route::post('add', 'Api\promotionController@store');
    });
    Route::group(['prefix' => 'promotionNews'], function () {
        route::get('list', 'Api\promotionNewsController@index');
        route::get('edit/{id}', 'Api\promotionNewsController@getedit');
        route::post('edit/{id}', 'Api\promotionNewsController@update');
        route::get('add', 'Api\promotionNewsController@add');
    });
    Route::group(['prefix' => 'user'], function () {
        route::get('list', 'Api\userController@index');
        route::get('edit', 'Api\userController@getedit');
        route::get('delete', 'Api\userController@getxoa');
        route::get('add', 'Api\userController@add');
    });
});

Route::get('trangchu', function () {
    return view('pages.trangchu');
});

Route::get('pages', 'PageController@trangchu');

Route::get('pages/showproduct/{id}', 'PageController@showproduct');

Route::get('pages/news', 'PageController@News');

Route::get('pages/newdetail/{id}', 'PageController@newdetail');

Route::get('pages/singleProduct/{id}/{a}', 'PageController@singleProduct');
Route::get('pages/cart', 'PageController@getcart');
Route::get('pages/cart', 'PageController@getcart');
Route::post('pages/cart', 'PageController@postcart');

Route::post('pages/loadmore', 'Productmore@loadMore');
Route::post('tintuc/loadmore', 'Tintucmore@loadMore');
Route::post('pages/timkiem', 'PageController@Timkiem');
Route::post('pages/timkiemajax', 'PageController@TimkiemAjax');
Route::post('pages/signUp', 'PageController@signUp');
Route::post('pages/createSession', 'PageController@createSession');

Route::post('pages/login', 'PageController@login');
