<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('/users', 'UsersController');
    $router->resource('/products', 'ProductsController');
    $router->resource('/orders', 'OrdersController');
    $router->get('/orders/{order}', 'OrdersController@show')->name('admin.orders.show');
    $router->post('orders/{order}/ship', 'OrdersController@ship')->name('admin.orders.ship');
    $router->post('orders/{order}/refund', 'OrdersController@handleRefund')->name('admin.orders.handle_refund');
    $router->resource('/coupon_codes', 'CouponCodesController');
    $router->post('coupon_codes', 'CouponCodesController@store');
    $router->get('coupon_codes/create', 'CouponCodesController@create');
    $router->resource('/categories', 'CategoriesController');
    $router->get('api/categories', 'CategoriesController@apiIndex');
    $router->resource('/crowdfunding_products', 'CrowdfundingProductsController');
    $router->resource('/seckill_products', 'SeckillProductsController');
});
//Route::group(['middleware' => 'auth:admin'], function(){
//    Route::get('admin/orders/{order}', '\App\Admin\Controllers\OrdersController@show')->name('admin.orders.show');
//});

