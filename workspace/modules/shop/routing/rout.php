<?php

use core\App;

App::$collector->group(['before' => 'auth'], function ($router){
    App::$collector->group(['prefix' => 'admin'], function ($router) {
        App::$collector->gridView('categories', ['workspace\modules\shop\controllers\CategoryController']);
    });
});

App::$collector->group(['before' => 'auth'], function ($router){
    App::$collector->group(['prefix' => 'admin'], function ($router) {
        App::$collector->gridView('parameters', ['workspace\modules\shop\controllers\ParameterController']);
    });
});

App::$collector->group(['before' => 'auth'], function ($router){
    App::$collector->group(['prefix' => 'admin'], function ($router) {

        App::$collector->gridView('products', ['workspace\modules\shop\controllers\ProductController']);

        App::$collector->post('/product_photo/load', [
            'workspace\modules\shop\controllers\ProductPhotoController', 'actionLoad',
        ]);

        App::$collector->post('/product_photo/delete', [
            'workspace\modules\shop\controllers\ProductPhotoController', 'actionDelete',
        ]);

        App::$collector->post('/product_photo', [
            'workspace\modules\shop\controllers\ProductPhotoController', 'actionIndex',
        ]);

        App::$collector->post('/parameters/list', [
            'workspace\modules\shop\controllers\ParameterController', 'actionGetProductParams',
        ]);

        App::$collector->gridView('/orders', ['workspace\modules\shop\controllers\OrderController']);

    });
});

App::$collector->group(['before' => 'auth'], function ($router){
    App::$collector->group(['prefix' => 'admin'], function ($router) {
        App::$collector->gridView('product_parameters', ['workspace\modules\shop\controllers\ProductParameterController']);
    });
});

App::$collector->get('shop/{page:i}?', ['workspace\modules\Shop\controllers\ShopController', 'actionIndex']);

App::$collector->get('product/{id}/', ['workspace\modules\Shop\controllers\ShopController', 'actionView']);

App::$collector->post('shop/add_to_cart', ['workspace\modules\Shop\controllers\ShopController', 'actionAddProductToCart']);

App::$collector->post('shop/remove_from_cart', ['workspace\modules\Shop\controllers\ShopController', 'actionRemoveProductFromCart']);

App::$collector->get('shop/cart', ['workspace\modules\Shop\controllers\ShopController', 'actionCart']);

App::$collector->any('shop/checkout', ['workspace\modules\Shop\controllers\ShopController', 'actionCheckout']);
