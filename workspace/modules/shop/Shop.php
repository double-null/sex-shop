<?php

namespace workspace\modules\shop;

use core\App;

class Shop
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Магазин',
                'url' => '#',
                'icon' => '<i class="nav-icon fa fa-shopping-cart"></i>',
                'sub' => [
                    [
                        'title' => 'Категории',
                        'url' => '/admin/categories'
                    ],
                    [
                        'title' => 'Товары',
                        'url' => '/admin/products',
                    ],
                    [
                        'title' => 'Характеристики',
                        'url' => '/admin/parameters',
                    ],
                    [
                        'title' => 'Заказы',
                        'url' => '/admin/orders'
                    ],
                ],
            ],
        ];
        App::mergeConfig($config);
    }
}
